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
}
