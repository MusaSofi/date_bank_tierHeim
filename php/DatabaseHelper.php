<?php

class DatabaseHelper
{
    // Since the connection details are constant, define them as const
    // We can refer to constants like e.g. DatabaseHelper::username
    const username = 'a12130179'; // use a + your matriculation number
    const password = ',fhcer21'; // use your oracle db password
    const con_string = '//oracle19.cs.univie.ac.at:1521/orclcdb';

    // Since we need only one connection object, it can be stored in a member variable.
    // $conn is set in the constructor.
    protected $conn;

    // Create connection in the constructor
    public function __construct()
    {
        try {
            // Create connection with the command oci_connect(String(username), String(password), String(connection_string))
            $this->conn = oci_connect(
                DatabaseHelper::username,
                DatabaseHelper::password,
                DatabaseHelper::con_string
            );

            //check if the connection object is != null
            if (!$this->conn) {
                // die(String(message)): stop PHP script and output message:
                die("DB error: Connection can't be established!");
            }

        } catch (Exception $e) {
            die("DB error: {$e->getMessage()}");
        }
    }

    public function __destruct()
    {
        // clean up
        oci_close($this->conn);
    }

    // This function creates and executes a SQL select statement and returns an array as the result
    // 2-dimensional array: the result array contains nested arrays (each contains the data of a single row)
    public function selectAllDoctors()
    {
        // Define the sql statement string
        // Notice that the parameters $person_id, $surname, $name in the 'WHERE' clause
        $sql = "SELECT * FROM TIERARZT ORDER BY LIZENZNUMMER";

        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = oci_parse($this->conn, $sql);

        // Executes the statement
        oci_execute($statement);
        $res = null;
        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);

        return $res;
    }


    public function insertIntoDoctor($name, $lizenzNummer, $spezialisierung, $handyNummer)
    {
        $sql = "INSERT INTO TIERARZT (Name, Lizenznummer, Spezialisierung, Handynummer) VALUES ('{$name}', {$lizenzNummer}, '{$spezialisierung}', '{$handyNummer}')";

        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function deleteDoctor($lizenzNummer)
    {
        $sql = "Delete from TIERARZT WHERE LIZENZNUMMER = {$lizenzNummer}";

        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function updateDoctor($name, $lizenzNummer, $spezialisierung, $handyNummer)
    {
        $sql = "UPDATE TIERARZT SET NAME='$name',SPEZIALISIERUNG='$spezialisierung',HANDYNUMMER = '$handyNummer' WHERE LIZENZNUMMER = $lizenzNummer";

        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function selectAllHeims()
    {
        // Define the sql statement string
        // Notice that the parameters $person_id, $surname, $name in the 'WHERE' clause
        $sql = "SELECT * FROM TIERHEIM ORDER BY HEIMID";

        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = oci_parse($this->conn, $sql);

        // Executes the statement
        oci_execute($statement);
        $res = null;
        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);

        return $res;
    }


    public function insertIntoHeims($name, $adresse)
    {
        $sql = "INSERT INTO TIERHEIM (Name, Adresse) VALUES ('{$name}', '{$adresse}')";

        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function deleteHeim($heimID)
    {
        $sql = "Delete from TIERHEIM WHERE HEIMID = {$heimID}";

        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function updateHeims($heimID, $name, $adresse)
    {
        $sql = "UPDATE TIERHEIM SET NAME='$name',ADRESSE='$adresse' WHERE HEIMID = $heimID";

        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }

    public function selectAllProfils()
    {
        // Define the sql statement string
        // Notice that the parameters $person_id, $surname, $name in the 'WHERE' clause
        $sql = "SELECT * FROM  KundeProfil ORDER BY PERSONALID";

        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = oci_parse($this->conn, $sql);

        // Executes the statement
        oci_execute($statement);
        $res = null;
        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);

        return $res;
    }

    public function selectLastProfil()
    {
        $sql = "SELECT PERSONALID FROM KUNDE ORDER BY PERSONALID DESC FETCH FIRST 1 ROWS ONLY";
        $statement = oci_parse($this->conn, $sql);
        oci_execute($statement);
        $res = null;
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);
        $personalID = $res[0]['PERSONALID'];
        return $personalID;
    }


    public function insertIntoProfils($name, $land, $stadt, $plz, $strasse, $hausnummer, $handynummer, $email, $bild)
    {


        $sql = "INSERT INTO Kunde (Name, Land, Stadt, PLZ, Strasse, Hausnummer, Handynummer)
        VALUES ('$name', '$land', '$stadt', $plz, '$strasse', $hausnummer, '$handynummer')";

        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);

        $personalID = $this->selectLastProfil();

        $sql = "INSERT INTO Profil (Name, PersonalID, Handynummer, Email, BILD)
        VALUES ('$name', $personalID, '$handynummer', '$email', EMPTY_BLOB()) RETURNING BILD INTO :image";

        $statement = oci_parse($this->conn, $sql);
        $blob = oci_new_descriptor($this->conn, OCI_D_LOB);
        oci_bind_by_name($statement, ':image', $blob, -1, OCI_B_BLOB);
        oci_execute($statement, OCI_DEFAULT) or die("Unable to execute query");
        if (!$blob->save($bild)) {
            oci_rollback($this->conn);
        } else {
            oci_commit($this->conn);
        }
        oci_free_statement($statement);
        $blob->free();
        return $success;

    }

    public function selectAllDogs()
    {
        // Define the sql statement string
        // Notice that the parameters $person_id, $surname, $name in the 'WHERE' clause
        $sql = "SELECT * FROM Dogs ORDER BY TIERID";

        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = oci_parse($this->conn, $sql);

        // Executes the statement
        oci_execute($statement);
        $res = null;
        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);

        return $res;
    }


    public function insertIntoDogs($tierID, $nameH, $impfung, $personalID, $abholDatum, $tierAlter, $hundIndex, $gewicht, $bild)
    {
        $sql = "INSERT INTO STRASSENTIER (TierID, Name, Impfung,PersonalID, AbholDatum, TIER_ALTER, BILD)
VALUES ($tierID, '$nameH', '$impfung', $personalID , to_date('$abholDatum','YYYY-MM-DD'), $tierAlter, EMPTY_BLOB()) RETURNING BILD INTO :image";
        $statement = oci_parse($this->conn, $sql);
        $blob = oci_new_descriptor($this->conn, OCI_D_LOB);
        oci_bind_by_name($statement, ':image', $blob, -1, OCI_B_BLOB);
        oci_execute($statement, OCI_DEFAULT) or die("Unable to execute query");
        if (!$blob->save($bild)) {
            oci_rollback($this->conn);
        } else {
            oci_commit($this->conn);
        }
        oci_free_statement($statement);
        $blob->free();

        $sql = "INSERT INTO HUND (TierID, HundIndex, Gewicht)
  VALUES ($tierID, $hundIndex, $gewicht)";
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;

    }

    public function deleteDog($tierID)
    {
        $sql = "Delete from HUND WHERE TIERID = {$tierID}";
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);

        $sql = "Delete from STRASSENTIER WHERE TIERID = {$tierID}";
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }


    public function updateDog($tierID, $nameH, $impfung, $personalID, $abholDatum, $tierAlter, $gewicht)
    {

        $sql = "UPDATE STRASSENTIER SET NAME='$nameH',IMPFUNG='$impfung',PERSONALID = $personalID,ABHOLDATUM =  to_date('$abholDatum','YYYY-MM-DD') ,TIER_ALTER =$tierAlter WHERE TIERID = $tierID";
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);

        $sql = "UPDATE HUND SET GEWICHT = $gewicht WHERE TIERID = $tierID";
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);


        return $success;
    }




    public function selectAllCats()
    {
        // Define the sql statement string
        // Notice that the parameters $person_id, $surname, $name in the 'WHERE' clause
        $sql = "SELECT * FROM Cats ORDER BY TIERID";

        // oci_parse(...) prepares the Oracle statement for execution
        // notice the reference to the class variable $this->conn (set in the constructor)
        $statement = oci_parse($this->conn, $sql);

        // Executes the statement
        oci_execute($statement);
        $res = null;
        // Fetches multiple rows from a query into a two-dimensional array
        // Parameters of oci_fetch_all:
        //   $statement: must be executed before
        //   $res: will hold the result after the execution of oci_fetch_all
        //   $skip: it's null because we don't need to skip rows
        //   $maxrows: it's null because we want to fetch all rows
        //   $flag: defines how the result is structured: 'by rows' or 'by columns'
        //      OCI_FETCHSTATEMENT_BY_ROW (The outer array will contain one sub-array per query row)
        //      OCI_FETCHSTATEMENT_BY_COLUMN (The outer array will contain one sub-array per query column. This is the default.)
        oci_fetch_all($statement, $res, null, null, OCI_FETCHSTATEMENT_BY_ROW);
        //clean up;
        oci_free_statement($statement);

        return $res;
    }


    public function insertIntoCats($tierID, $name, $impfung, $personalID, $abholDatum, $tierAlter, $katzenIndex, $hauskatze, $bild)
    {
        $sql = "INSERT INTO STRASSENTIER (TierID, Name, Impfung,PersonalID, AbholDatum, TIER_ALTER, BILD)
VALUES ($tierID, '$name', '$impfung', $personalID , to_date('$abholDatum','YYYY-MM-DD'), $tierAlter, EMPTY_BLOB()) RETURNING BILD INTO :image";
        $statement = oci_parse($this->conn, $sql);
        $blob = oci_new_descriptor($this->conn, OCI_D_LOB);
        oci_bind_by_name($statement, ':image', $blob, -1, OCI_B_BLOB);
        oci_execute($statement, OCI_DEFAULT) or die("Unable to execute query");
        if (!$blob->save($bild)) {
            oci_rollback($this->conn);
        } else {
            oci_commit($this->conn);
        }
        oci_free_statement($statement);
        $blob->free();

        $sql = "INSERT INTO KATZE (TierID, KATZENINDEX, HAUSKATZE)
  VALUES ($tierID, $katzenIndex, '$hauskatze')";
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;

    }


    public function deleteKatze($tierID)
    {
        $sql = "Delete from KATZE WHERE TIERID = {$tierID}";
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);

        $sql = "Delete from STRASSENTIER WHERE TIERID = {$tierID}";
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);
        return $success;
    }



    public function updateKatze($tierID, $nameH, $impfung, $personalID, $abholDatum, $tierAlter, $hauskatze)
    {

        $sql = "UPDATE STRASSENTIER SET NAME='$nameH',IMPFUNG='$impfung',PERSONALID = $personalID,ABHOLDATUM =  to_date('$abholDatum','YYYY-MM-DD') ,TIER_ALTER =$tierAlter WHERE TIERID = $tierID";
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);

        $sql = "UPDATE KATZE SET HAUSKATZE = '$hauskatze' WHERE TIERID = $tierID";
        $statement = oci_parse($this->conn, $sql);
        $success = oci_execute($statement) && oci_commit($this->conn);
        oci_free_statement($statement);


        return $success;
    }


    public function getDoctorByTierID($tierID)
    {
        
        $sql = "BEGIN GetTierarztByTierID(:myId, :TierarztName, :TierarztHandynummber); END;";
        $statement = oci_parse($this->conn, $sql);
        
        $myId = $tierID;
        oci_bind_by_name($statement, ":myId", $myId, -1, SQLT_INT);
        
        $TierarztName = "";
        $TiararztHandynummber = "";
        oci_bind_by_name($statement, ":TierarztName", $TierarztName, 255);
        oci_bind_by_name($statement, ":TierarztHandynummber", $TiararztHandynummber, 20);
        
        oci_execute($statement);
        oci_free_statement($statement);
       


        return [$TierarztName, $TiararztHandynummber];
    }






}