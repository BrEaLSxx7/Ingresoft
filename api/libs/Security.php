<?php

class Security
{
    /**
     * @param string $pass
     * @return string
     */
    public function has(string $pass): string
    {
        return crypt($pass, password_hash($pass, 1));
    }

    public function verifyPass(string $hash, string $pass): bool
    {
        return password_verify($pass, $hash);
    }
}
