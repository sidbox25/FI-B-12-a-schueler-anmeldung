<?php

namespace src\Core\Configuration\Database;

class ConnectionConfig
{
    /**
     * @return string
     */
    public static function getDatabaseUser(): string
    {
        return "schueler_anmeldung_user";
    }

    /**
     * @return string
     */
    public static function getDatabasePassword(): string
    {
        return "Password123$";
    }

    /**
     * @return string
     */
    public static function getDatabaseHost(): string
    {
        return "localhost";
    }

    /**
     * @return string
     */
    public static function getDatabaseName(): string
    {
        return "StudentRegistration";
    }

    /**
     * @return string
     */
    public static function getDatabaseDriver(): string
    {
        return "mysql";
    }
}
