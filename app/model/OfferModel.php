<?php

class OfferModel extends Database {

    public function getLatestOffers() {
        $result = $this->query("SELECT id_internship, internship_name, offer_date, company.id_company, company_name, city_name FROM internship JOIN city ON internship.id_city = city.id_city JOIN company ON company.id_company = internship.id_company ORDER BY offer_date DESC LIMIT 4");
        return $result->fetchAll();
    }

    public function searchOffers($limit, $page, $internship_name = null, $company_name = null, $city_name = null, $sector_name = null, $nb_places = null, $skill_name = null, $duration = null, $salary = null) {
        $offset = $limit * ($page - 1);
        $tab = [];
        $query = "SELECT internship.id_internship, internship_name, offer_date, company.id_company, company_name, city_name, GROUP_CONCAT(DISTINCT skill_name ORDER BY skill_name SEPARATOR ', ') AS skills, duration, salary, internship.description FROM internship JOIN city ON internship.id_city = city.id_city JOIN company ON company.id_company = internship.id_company JOIN need ON internship.id_internship = need.id_internship JOIN skill ON need.id_skill = skill.id_skill WHERE is_visible = 1";
        if ($internship_name != null) {
            $query .= " AND internship_name LIKE ?";
            array_push($tab, '%'.$internship_name.'%');
        }
        if ($company_name != null) {
            $query .= " AND company_name LIKE ?";
            array_push($tab, '%'.$company_name.'%');
        }
        if ($city_name != null) {
            $query .= " AND city_name LIKE ?";
            array_push($tab, '%'.$city_name.'%');
        }
        if ($sector_name != null) {
            $query .= " AND sector_name LIKE ?";
            array_push($tab, '%'.$sector_name.'%');
        }
        if ($nb_places != null) {
            $query .= " AND nb_places >= ?";
            array_push($tab, $nb_places);
        }
        if ($skill_name != null) {
            $query .= " AND skill_name LIKE ?";
            array_push($tab, '%'.$skill_name.'%');
        }
        if ($duration != null) {
            $query .= " AND duration >= ?";
            array_push($tab, $duration);
        }
        if ($salary != null) {
            $query .= " AND salary >= ?";
            array_push($tab, $salary);
        }
        $query .= " GROUP BY internship.id_internship ORDER BY offer_date DESC LIMIT $limit OFFSET $offset";
        $result = $this->query($query, $tab);
        return $result->fetchAll();
    }

    public function getOfferDetails($id) {
        $result = $this->query("SELECT internship.id_internship, internship_name, offer_date, company.id_company, company_name, city_name, internship.description, duration, salary, GROUP_CONCAT(DISTINCT skill_name ORDER BY skill_name SEPARATOR ', ') AS skills, internship.description, sector_name FROM internship JOIN city ON internship.id_city = city.id_city JOIN company ON company.id_company = internship.id_company LEFT JOIN need ON internship.id_internship = need.id_internship JOIN skill ON need.id_skill = skill.id_skill JOIN sector ON company.id_sector = sector.id_sector WHERE internship.id_internship = ? GROUP BY internship.id_internship", [$id]);
        return $result->fetch();
    }
}
