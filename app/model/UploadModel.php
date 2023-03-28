<?php

class UploadModel {

    static function uploadPdf(string $type, array $file, string $last_name, string $first_name) {
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $file_type = $file['type'];

        $file_extension = explode('/', $file_type);
        $file_extension = strtolower(end($file_extension));

        $allowed_extension = ['pdf'];

        if (in_array($file_extension, $allowed_extension)) {
            if ($file_error === 0) {
                if ($file_size <= 2097152) {
                    $file_name_new = $type."_".$last_name.'-'.$first_name.'.'.$file_extension;
                    $file_destination = '../core/uploads/' . $file_name_new;
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        return $file_destination;
                    }
                    else {
                        return false;
                    }
                }
                else {
                    return false;
                }
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }

    static function uploadImgCompany(array $file, string $company_name) {
        $file_tmp = $file['tmp_name'];
        $file_size = $file['size'];
        $file_error = $file['error'];
        $file_type = $file['type'];

        $file_extension = explode('/', $file_type);
        $file_extension = strtolower(end($file_extension));

        $allowed_extension = ['webp'];

        if (in_array($file_extension, $allowed_extension)) {
            if ($file_error === 0) {
                if ($file_size <= 2097152) {
                    // lower case and replace space by nothing
                    $new_file_name = strtolower(str_replace(' ', '', $company_name));
                    $new_file_name = $new_file_name.'.'.$file_extension;
                    $file_destination = 'img/company/' . $new_file_name;
                    if (move_uploaded_file($file_tmp, $file_destination)) {
                        return true;
                    }
                    else {
                        return false;
                    }
                }
                else {
                    return false;
                }
            }
            else {
                return false;
            }
        }
        else {
            return false;
        }
    }
}
