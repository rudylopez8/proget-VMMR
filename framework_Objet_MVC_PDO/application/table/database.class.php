<?php
class Database
{

    static public function creer(string $sqlfile): string
    {
        $sql = file_get_contents($sqlfile);
        Table::$link->setAttribute(PDO::ATTR_EMULATE_PREPARES, 0);
        Table::$link->exec($sql);
        return $sql;
    }

    /*
    static public function genererUtilisateur(int $nbuser, int $nbprofil): int
    {
        $sql = "insert into utilisateur values ";
        $data = [];
        for ($i = 1; $i <= $nbuser; $i++) {
            $uti_nom = "nom n°$i";
            $uti_prenom = "prenom n°$i";
            $d = mktime(0, 0, 0, rand(1, 2), rand(1, 30), rand(1950,2003));
            $uti_dtnais = date("Y-m-d", $d);
            $uti_profil = rand(1, $nbprofil);

            $data[] = "(null,'$uti_nom','$uti_prenom','$uti_dtnais','$uti_profil')";
        }

        return Table::$link->exec($sql . implode(",", $data));
    }

    static public function genererProfil(): int
    {
        $sql = "insert into profil values ";
        $data = [];
        $data[] = "(null,'Administrateur')";
        $data[] = "(null,'moderateur')";
        $data[] = "(null,'utilisateur')";

        return Table::$link->exec($sql . implode(",", $data));
    }

    static public function genererMsg(int $nbmsg, int $nbutilisateur): int
    {
        $data = [];
        $sql = "insert into message values ";
        for ($i = 1; $i <= $nbmsg; $i++) {
            $mes_texte = "mon texte n°$i";
            $mes_utilisateur = rand(1,$nbutilisateur); 
            $d = mktime(0, 0, 0, rand(1, 12), rand(1, 30), 2019);
            $mes_date = date("Y-m-d", $d);

            $data[] = "(null,'$mes_texte','$mes_utilisateur','$mes_date')";
        }
        return Table::$link->exec($sql . implode(",", $data));
    }
    */
}
