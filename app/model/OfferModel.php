<?php

class OfferModel extends Database {

    public function getLatestOffers() {
        $result = $this->query("SELECT id_internship, internship_name, offer_date, company_name, city_name FROM internship JOIN city ON internship.id_city = city.id_city JOIN company ON company.id_company = internship.id_company ORDER BY offer_date DESC LIMIT 4");
        return $result->fetchAll();
    }

    public function searchOffers($limit, $page) {
        $result = $this->query("SELECT id_internship, internship_name, offer_date, company_name, city_name FROM internship JOIN city ON internship.id_city = city.id_city JOIN company ON company.id_company = internship.id_company ORDER BY offer_date DESC LIMIT $limit");
        return $result->fetchAll();
    }

    public function getOfferDetails($id) {
        $result = $this->query("SELECT internship.id_internship, internship_name, offer_date, company_name, city_name, internship.description, duration, salary, GROUP_CONCAT(DISTINCT skill_name ORDER BY skill_name SEPARATOR ', ') AS skills, internship.description, sector_name FROM internship JOIN city ON internship.id_city = city.id_city JOIN company ON company.id_company = internship.id_company JOIN need ON internship.id_internship = need.id_internship JOIN skill ON need.id_skill = skill.id_skill JOIN sector ON company.id_sector = sector.id_sector WHERE internship.id_internship = ? GROUP BY internship.id_internship", [$id]);
        return $result->fetch();
    }
}
