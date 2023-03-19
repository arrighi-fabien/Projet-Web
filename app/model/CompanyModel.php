<?php

class CompanyModel extends Database {

    public function getBestCompanies() {
        $result = $this->query("SELECT company_name, GROUP_CONCAT(DISTINCT city_name ORDER BY city_name SEPARATOR ', ') AS city, sector_name, COUNT(id_internship) AS offers FROM company JOIN work_at ON company.id_company = work_at.id_company JOIN city ON work_at.id_city = city.id_city JOIN sector ON company.id_sector = sector.id_sector LEFT JOIN internship ON company.id_company = internship.id_company WHERE is_visible = 1 GROUP BY company.id_company ORDER BY nb_student_accepted DESC LIMIT 4");
        return $result->fetchAll();
    }

    public function searchCompanies($limit, $page, $company_name = null, $city_name = null, $sector_name = null, $student_accepted = null, $rate = null, $trust = null) {
        $offset = $limit * ($page - 1);
        $query = "SELECT company_name, GROUP_CONCAT(DISTINCT city_name ORDER BY city_name SEPARATOR ', ') AS city, sector_name, COUNT(id_internship) AS offers FROM company LEFT JOIN work_at ON company.id_company = work_at.id_company LEFT JOIN city ON work_at.id_city = city.id_city JOIN sector ON company.id_sector = sector.id_sector LEFT JOIN internship ON company.id_company = internship.id_company WHERE is_visible = 1";
        if ($company_name != null) {
            $query .= " AND company_name LIKE '%$company_name%'";
        }
        if ($city_name != null) {
            $query .= " AND city_name LIKE '%$city_name%'";
        }
        if ($sector_name != null) {
            $query .= " AND sector_name LIKE '%$sector_name%'";
        }
        if ($student_accepted != null) {
            $query .= " AND nb_student_accepted >= $student_accepted";
        }
        if ($rate != null) {
            $query .= " AND rate >= $rate";
        }
        if ($trust != null) {
            $query .= " AND trust >= $trust";
        }
        $query .= " GROUP BY company.id_company ORDER BY nb_student_accepted DESC LIMIT $limit OFFSET $offset";
        $result = $this->query($query);
        return $result->fetchAll();
    }

    public function getSectors() {
        $result = $this->query("SELECT sector_name FROM sector");
        return $result->fetchAll();
    }
}
