<?php

class OfferModel extends Database {

    public function getLatestOffers() {
        $result = $this->query("SELECT id_internship, internship_name, offer_date, company.id_company, company_name, city_name FROM internship JOIN city ON internship.id_city = city.id_city JOIN company ON company.id_company = internship.id_company ORDER BY offer_date DESC LIMIT 4");
        return AppModel::getEllapsedTime($result->fetchAll(), 'offer_date');
    }

    public function searchOffers($limit, $page, $internship_name = null, $company_name = null, $city_name = null, $sector_name = null, $nb_places = null, $skill_name = null, $duration = null, $salary = null) {
        $offset = $limit * ($page - 1);
        $tab = [];
        $query = "SELECT internship.id_internship, internship_name, offer_date, company.id_company, company_name, city_name, places_students, GROUP_CONCAT(DISTINCT skill_name ORDER BY skill_name SEPARATOR ', ') AS skills, duration, salary, internship.description FROM internship JOIN city ON internship.id_city = city.id_city JOIN company ON company.id_company = internship.id_company JOIN need ON internship.id_internship = need.id_internship JOIN skill ON need.id_skill = skill.id_skill WHERE is_visible = 1";
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
        return AppModel::getEllapsedTime($result->fetchAll(), 'offer_date');
    }

    public function searchOffersMaxPage($internship_name = null, $company_name = null, $city_name = null, $sector_name = null, $nb_places = null, $skill_name = null, $duration = null, $salary = null) {
        $tab = [];
        $query = "SELECT COUNT(*) as max_page FROM (SELECT COUNT(internship.id_internship) AS max_page FROM internship JOIN city ON internship.id_city = city.id_city JOIN company ON company.id_company = internship.id_company JOIN need ON internship.id_internship = need.id_internship JOIN skill ON need.id_skill = skill.id_skill WHERE is_visible = 1";
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
        $query .= " GROUP BY internship.id_internship) as filtered_internship";
        $result = $this->query($query, $tab);
        return $result->fetch();
    }

    public function getOfferDetails($id) {
        $result = $this->query("SELECT internship.id_internship, internship_name, offer_date, places_students, company.id_company, company_name, city_name, internship.description, duration, salary, GROUP_CONCAT(DISTINCT skill_name ORDER BY skill_name SEPARATOR ', ') AS skills, internship.description, sector_name FROM internship JOIN city ON internship.id_city = city.id_city JOIN company ON company.id_company = internship.id_company LEFT JOIN need ON internship.id_internship = need.id_internship JOIN skill ON need.id_skill = skill.id_skill JOIN sector ON company.id_sector = sector.id_sector WHERE internship.id_internship = ? GROUP BY internship.id_internship", [$id]);
        if ($result->rowCount() == 0) {
            return false;
        }
        return AppModel::getEllapsedTime([$result->fetch()], 'offer_date');
    }

    public function getSkills() {
        return $this->query("SELECT id_skill, skill_name FROM skill")->fetchAll();
    }

    public function getOfferSkills($id) {
        return $this->query("SELECT id_skill, skill_name FROM need NATURAL JOIN skill WHERE id_internship = ?", [$id])->fetchAll();
    }

    public function addOffer($internship_name, $id_company, $city_name, $description, $duration, $salary, $nb_places, $skills) {
        // get id of city and create it if it doesn't exist
        $id_city = $this->query("SELECT id_city FROM city WHERE city_name = ?", [$city_name])->fetch();
        if ($id_city == null) {
            $this->query("INSERT INTO city (city_name) VALUES (?)", [$city_name]);
            $id_city = $this->query("SELECT id_city FROM city WHERE city_name = ?", [$city_name])->fetch();
        }
        $id_city = $id_city->id_city;
        $this->query("INSERT INTO internship (internship_name, id_company, id_city, description, duration, salary, places_students) VALUES (?, ?, ?, ?, ?, ?, ?)", [$internship_name, $id_company, $id_city, $description, $duration, $salary, $nb_places]);
        $id_internship = $this->query("SELECT id_internship FROM internship WHERE internship_name = ? AND id_company = ? AND id_city = ? AND description = ? AND duration = ? AND salary = ? AND places_students = ?", [$internship_name, $id_company, $id_city, $description, $duration, $salary, $nb_places])->fetch();
        $id_internship = $id_internship->id_internship;
        foreach ($skills as $skill) {
            $this->query("INSERT INTO need (id_internship, id_skill) VALUES (?, ?)", [$id_internship, $skill]);
        }
    }

    public function updateOffer($id, $internship_name, $id_company, $city_name, $description, $duration, $salary, $nb_places, $skills) {
        // get id of city and create it if it doesn't exist
        $id_city = $this->query("SELECT id_city FROM city WHERE city_name = ?", [$city_name])->fetch();
        if ($id_city == null) {
            $this->query("INSERT INTO city (city_name) VALUES (?)", [$city_name]);
            $id_city = $this->query("SELECT id_city FROM city WHERE city_name = ?", [$city_name])->fetch();
        }
        $id_city = $id_city->id_city;
        $this->query("UPDATE internship SET internship_name = ?, id_company = ?, id_city = ?, description = ?, duration = ?, salary = ?, places_students = ? WHERE id_internship = ?", [$internship_name, $id_company, $id_city, $description, $duration, $salary, $nb_places, $id]);
        $this->query("DELETE FROM need WHERE id_internship = ?", [$id]);
        foreach ($skills as $skill) {
            $this->query("INSERT INTO need (id_internship, id_skill) VALUES (?, ?)", [$id, $skill]);
        }
    }

    public function deleteOffer($id) {
        $this->query("DELETE FROM internship WHERE id_internship = ?", [$id]);
    }
}
