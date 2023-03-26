<?php

class CompanyModel extends Database {

    public function getBestCompanies() {
        return $this->query("SELECT company.id_company, company_name, GROUP_CONCAT(DISTINCT city_name ORDER BY city_name SEPARATOR ', ') AS city, sector_name, COUNT(DISTINCT id_internship) AS offers FROM company NATURAL JOIN work_at NATURAL JOIN city NATURAL JOIN sector LEFT JOIN internship ON company.id_company = internship.id_company WHERE is_visible = 1 GROUP BY company.id_company ORDER BY nb_student_accepted DESC LIMIT 4")->fetchAll();
    }

    public function getCompanyDetails($id) {
        return $this->query("SELECT company.id_company, company_name, GROUP_CONCAT(DISTINCT city_name ORDER BY city_name SEPARATOR ', ') AS city, sector_name, COUNT(id_internship) AS offers, email, nb_student_accepted, IFNULL((SELECT 1 FROM trust WHERE trust.id_company = company.id_company), 0) AS trust, company_description, is_visible FROM company JOIN work_at ON company.id_company = work_at.id_company JOIN city ON work_at.id_city = city.id_city JOIN sector ON company.id_sector = sector.id_sector LEFT JOIN internship ON company.id_company = internship.id_company WHERE company.id_company = ? GROUP BY company.id_company", [$id])->fetch();
    }

    public function searchCompanies($limit, $page, $company_name = null, $city_name = null, $sector_name = null, $student_accepted = null, $rate = null, $trust = null, $is_visible = 1) {
        $offset = $limit * ($page - 1);
        $tab = [];
        $query = "SELECT company.id_company, company_name, GROUP_CONCAT(DISTINCT city_name ORDER BY city_name SEPARATOR ', ') AS city, sector_name, COUNT(DISTINCT id_internship) AS offers, ROUND(AVG(evaluation), 2) AS rate, (SELECT CASE WHEN COUNT(*) > 0 THEN 1 ELSE 0 END FROM trust WHERE trust.id_company = company.id_company) AS trust FROM company LEFT JOIN work_at ON company.id_company = work_at.id_company LEFT JOIN city ON work_at.id_city = city.id_city JOIN sector ON company.id_sector = sector.id_sector LEFT JOIN internship ON company.id_company = internship.id_company LEFT JOIN rate ON company.id_company = rate.id_company WHERE is_visible = ?";
        array_push($tab, $is_visible);
        if ($company_name != null) {
            $query .= " AND company_name LIKE ?";
            array_push($tab, '%'.$company_name.'%');
        }
        if ($city_name != null) {
            $query .= " AND city_name LIKE ?";
            array_push($tab,'%'.$city_name.'%');
        }
        if ($sector_name != null) {
            $query .= " AND sector_name = ?";
            array_push($tab, $sector_name);
        }
        if ($student_accepted != null) {
            $query .= " AND nb_student_accepted >= ?";
            array_push($tab, $student_accepted);
        }
        if ($trust != null) {
            $query .= " AND (SELECT CASE WHEN COUNT(*) > 0 THEN 1 ELSE 0 END FROM trust WHERE trust.id_company = company.id_company) = ?";
            array_push($tab, $trust);
        }
        $query .= " GROUP BY company.id_company";
        if ($rate != null) {
            $query .= " HAVING ROUND(AVG(evaluation), 2) >= ?";
            array_push($tab, (int)$rate);
        }
        $query .= " ORDER BY nb_student_accepted DESC LIMIT $limit OFFSET $offset";
        return $this->query($query, $tab)->fetchAll();
    }

    public function searchCompaniesMaxPage($company_name = null, $city_name = null, $sector_name = null, $student_accepted = null, $rate = null, $trust = null, $is_visible = 1) {
        $tab = [];
        $query = "SELECT COUNT(*) AS max_page FROM (SELECT COUNT(id_company) AS  max_page FROM company NATURAL LEFT JOIN work_at NATURAL LEFT JOIN city NATURAL LEFT JOIN sector NATURAL LEFT JOIN internship NATURAL LEFT JOIN rate WHERE is_visible = ?";
        array_push($tab, $is_visible);
        if ($company_name != null) {
            $query .= " AND company_name LIKE ?";
            array_push($tab, '%'.$company_name.'%');
        }
        if ($city_name != null) {
            $query .= " AND city_name LIKE ?";
            array_push($tab,'%'.$city_name.'%');
        }
        if ($sector_name != null) {
            $query .= " AND sector_name = ?";
            array_push($tab, $sector_name);
        }
        if ($student_accepted != null) {
            $query .= " AND nb_student_accepted >= ?";
            array_push($tab, $student_accepted);
        }
        if ($trust != null) {
            $query .= " AND (SELECT CASE WHEN COUNT(*) > 0 THEN 1 ELSE 0 END FROM trust WHERE trust.id_company = company.id_company) = ?";
            array_push($tab, $trust);
        }
        $query .= " GROUP BY id_company) as filtered_companies;";
        $result = $this->query($query, $tab);
        return $result->fetch();
    }

    public function getSectors() {
        return $this->query("SELECT id_sector, sector_name FROM sector")->fetchAll();
    }

    public function setRate($id_company, $id_user, $rate) {
        $this->query("DELETE FROM rate WHERE id_company = ? AND id_user = ?", [$id_company, $id_user]);
        $this->query("INSERT INTO rate (id_company, id_user, evaluation) VALUES (?, ?, ?)", [$id_company, $id_user, $rate]);
    }

    public function getRate($id_company) {
        return $this->query("SELECT ROUND(AVG(evaluation), 2) AS evaluation FROM rate WHERE id_company = ?;", [$id_company])->fetch();
    }

    public function getUserRate($id_company, $id_user) {
        return $this->query("SELECT evaluation FROM rate WHERE id_company = ? AND id_user = ?;", [$id_company, $id_user])->fetch();
    }
    
    public function getCompanies() {
        return $this->query("SELECT id_company, company_name FROM company ORDER BY company_name ASC")->fetchAll();
    }

    public function addCompany($company_name, $company_email, $is_visible, $city_name, $id_sector, $student_accepted, $description) {
        $this->query("INSERT INTO company (company_name, email, is_visible, id_sector, nb_student_accepted, company_description) VALUES (?, ?, ?, ?, ?, ?)", [$company_name, $company_email, $is_visible, $id_sector, $student_accepted, $description]);
        $id_company = $this->query("SELECT id_company FROM company WHERE company_name = ? AND id_sector = ? AND company_description = ?", [$company_name, $id_sector, $description])->fetch();
        $city_name = explode(',', $city_name);
        // suprimmer les espaces après la virgule
        foreach ($city_name as $key => $value) {
            $city_name[$key] = trim($value);
        }
        foreach ($city_name as $city) {
            $id_city = $this->query("SELECT id_city FROM city WHERE city_name = ?", [$city])->fetch();
            if ($id_city == null) {
                $this->query("INSERT INTO city (city_name) VALUES (?)", [$city]);
                $id_city = $this->query("SELECT id_city FROM city WHERE city_name = ?", [$city])->fetch();
            }
            $this->query("INSERT INTO work_at (id_company, id_city) VALUES (?, ?)", [$id_company->id_company, $id_city->id_city]);
        }
    }

    public function updateCompany($id_company, $company_name, $company_email, $is_visible, $city_name, $id_sector, $student_accepted, $description) {
        $this->query("UPDATE company SET company_name = ?, email = ?, is_visible = ?, id_sector = ?, nb_student_accepted = ?, company_description = ? WHERE id_company = ?", [$company_name, $company_email, $is_visible, $id_sector, $student_accepted, $description, $id_company]);
        $this->query("DELETE FROM work_at WHERE id_company = ?", [$id_company]);
        $city_name = explode(',', $city_name);
        // suprimmer les espaces après la virgule
        foreach ($city_name as $key => $value) {
            $city_name[$key] = trim($value);
        }
        foreach ($city_name as $city) {
            $id_city = $this->query("SELECT id_city FROM city WHERE city_name = ?", [$city])->fetch();
            if ($id_city == null) {
                $this->query("INSERT INTO city (city_name) VALUES (?)", [$city]);
                $id_city = $this->query("SELECT id_city FROM city WHERE city_name = ?", [$city])->fetch();
            }
            $this->query("INSERT INTO work_at (id_company, id_city) VALUES (?, ?)", [$id_company, $id_city->id_city]);
        }
    }

    public function hideCompany($id_company) {
        $this->query("UPDATE company SET is_visible = 0 WHERE id_company = ?", [$id_company]);
    }
}
