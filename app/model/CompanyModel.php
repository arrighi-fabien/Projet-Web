<?php

class CompanyModel extends Database {

    public function getBestCompanies() {
        return $this->query("SELECT company.id_company, company_name, GROUP_CONCAT(DISTINCT city_name ORDER BY city_name SEPARATOR ', ') AS city, sector_name, COUNT(DISTINCT id_internship) AS offers FROM company NATURAL JOIN work_at NATURAL JOIN city NATURAL JOIN sector LEFT JOIN internship ON company.id_company = internship.id_company WHERE is_visible = 1 GROUP BY company.id_company ORDER BY nb_student_accepted DESC LIMIT 4")->fetchAll();
    }

    public function getCompanyDetails($id) {
        return $this->query("SELECT company.id_company, company_name, GROUP_CONCAT(DISTINCT city_name ORDER BY city_name SEPARATOR ', ') AS city, sector_name, COUNT(id_internship) AS offers, IFNULL((SELECT 1 FROM trust WHERE trust.id_company = company.id_company), 0) AS trust, company_description FROM company JOIN work_at ON company.id_company = work_at.id_company JOIN city ON work_at.id_city = city.id_city JOIN sector ON company.id_sector = sector.id_sector LEFT JOIN internship ON company.id_company = internship.id_company WHERE is_visible = 1 AND company.id_company = ? GROUP BY company.id_company", [$id])->fetch();
    }

    public function searchCompanies($limit, $page, $company_name = null, $city_name = null, $sector_name = null, $student_accepted = null, $rate = null, $trust = null) {
        $offset = $limit * ($page - 1);
        $tab = [];
        $query = "SELECT company.id_company, company_name, GROUP_CONCAT(DISTINCT city_name ORDER BY city_name SEPARATOR ', ') AS city, sector_name, COUNT(DISTINCT id_internship) AS offers, ROUND(AVG(evaluation), 2) AS rate, IFNULL((SELECT 1 FROM trust WHERE trust.id_company = company.id_company), 0) AS trust FROM company LEFT JOIN work_at ON company.id_company = work_at.id_company LEFT JOIN city ON work_at.id_city = city.id_city JOIN sector ON company.id_sector = sector.id_sector LEFT JOIN internship ON company.id_company = internship.id_company LEFT JOIN rate ON company.id_company = rate.id_company WHERE is_visible = 1";
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
            $query .= " AND IFNULL((SELECT 1 FROM trust WHERE trust.id_company = company.id_company), 0) = ?";
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
    
    
    public function searchCompaniesMaxPage($company_name = null, $city_name = null, $sector_name = null, $student_accepted = null, $rate = null, $trust = null) {
        $tab = [];
        $query = "SELECT COUNT(*) AS max_page FROM (SELECT COUNT(id_company) AS  max_page FROM company NATURAL LEFT JOIN work_at NATURAL LEFT JOIN city NATURAL LEFT JOIN sector NATURAL LEFT JOIN internship NATURAL LEFT JOIN rate WHERE is_visible = 1";
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
            $query .= " AND IFNULL((SELECT 1 FROM trust WHERE trust.id_company = company.id_company), 0) = ?";
            array_push($tab, $trust);
        }
        $query .= " GROUP BY id_company) as filtered_companies;";
        $result = $this->query($query, $tab);
        return $result->fetch();
    }

    public function getSectors() {
        return $this->query("SELECT sector_name FROM sector")->fetchAll();
    }

    public function setRate($id_company, $id_user, $rate) {
        $this->query("DELETE FROM rate WHERE id_company = ? AND id_user = ?", [$id_company, $id_user]);
        $this->query("INSERT INTO rate (id_company, id_user, evaluation) VALUES (?, ?, ?)", [$id_company, $id_user, $rate]);
    }
}
