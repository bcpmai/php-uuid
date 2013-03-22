<?php namespace J20\Uuid;

/**
 * Uuid
 *
 * Generate a Universally Unique Identifier
 */

class Uuid {

    /**
     * Generate a UUID v4
     *
     * The UUID is 36 characters with dashes, 32 characters without.
     *
     * @return string  E.g. 67f71e26-6d76-4d6b-9b6b-944c28e32c9d
     */
    public static function v4($dashes = true)
    {
        if ($dashes)
        {
            $format = '%04x%04x-%04x-%04x-%04x-%04x%04x%04x';
        }
        else
        {
            $format = '%04x%04x%04x%04x%04x%04x%04x%04x';
        }

        return sprintf($format,

            // 32 bits for "time_low"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff),

            // 16 bits for "time_mid"
            mt_rand(0, 0xffff),

            // 16 bits for "time_hi_and_version",
            // four most significant bits holds version number 4
            mt_rand(0, 0x0fff) | 0x4000,

            // 16 bits, 8 bits for "clk_seq_hi_res",
            // 8 bits for "clk_seq_low",
            // two most significant bits holds zero and one for variant DCE1.1
            mt_rand(0, 0x3fff) | 0x8000,

            // 48 bits for "node"
            mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff)
        );
    }

}
