<?php

namespace src\Core\Configuration\Database;

class ConnectionConfig
{
    /**
     * @return string
     */
    public static function getDatabaseUser(): string
    {
        return "root";
    }

    /**
     * @return string
     */
    public static function getDatabasePassword(): string
    {
        return "";
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
        return "test";
    }

    /**
     * @return string
     */
    public static function getDatabaseDriver(): string
    {
        return "mysql";
    }
}
