<?php

/**
 * 3º
 */
class usuarios extends model
{
    public function getUsuarios($limite = 0)
    {
        $usuarios = array();
        
        $sql = "SELECT * FROM usuarios";
        if ($limite > 0) {
            $sql .= " LIMIT ".$limite;
        }
        $query = $this->db->query($sql);
        
        if ($query->rowCount() > 0) {
            $usuarios = $query->fetchAll();
        }
        
        return $usuarios;
    }
}
