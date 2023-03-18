<?php

class CompanyModel extends Database {

    public function getBestCompanies() {
        $result = $this->query("SELECT company_name, GROUP_CONCAT(DISTINCT city_name ORDER BY city_name SEPARATOR ', ') AS city, sector_name, COUNT(id_internship) AS offers, picture FROM company JOIN work_at ON company.id_company = work_at.id_company JOIN city ON work_at.id_city = city.id_city JOIN sector ON company.id_sector = sector.id_sector LEFT JOIN internship ON company.id_company = internship.id_company WHERE is_visible = 1 GROUP BY company.id_company ORDER BY nb_student_accepted DESC LIMIT 4");
        return $result->fetchAll();
    }

}