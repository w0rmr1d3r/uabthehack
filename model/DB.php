<?php    
class DataBase
{
    /* @var DataBase|null Singleton instance of class */
    private static $instance = NULL;

    /* @var string Server IP - LOCALHOST TEST*/
    private static $servername = '127.0.0.1';

    /* @var string Server username - LOCALHOST TEST */
    private static $username = 'root';

    /* @var string Server password - LOCALHOST TEST */
    private static $password = '';

    /* @var string Database name - LOCALHOST TEST */
    private static $db_name = 'song_giver_db';

    /* @var mysqli|null Database connection object */
    private $conn;

    /**
     * Creates the object and the DB connection
     */
    private function __construct()
    {
        $this->conn = new mysqli(self::$servername, self::$username, self::$password, self::$db_name);
        if ($this->conn->connect_error)
        {
            die('Connection failed: ' . $this->conn->connect_error);
        }
    }
     
    /**
     * Gets instance of Singleton DB
     * @return DataBase
     */
    public static function getInstance()
    {
        if (is_null(self::$instance))
        {
            self::$instance = new DataBase();
        }
     
        return self::$instance;
    }

    /**
     * Closes connection and destroys self instance
     * @return void
     */
    public function closeConnection()
    {
        $this->conn->close();
        self::$instance = NULL;
    }

    public function getGroups()
    {
        $query = 'SELECT id, name FROM Groups ORDER BY name';
        if ($result = $this->conn->query($query))
        {
            $receivedGroups = [];
            while ($row = $result->fetch_assoc())
            {
                array_push($receivedGroups, new Group($row['id'], $row['name']));
            }
            $result->free();
            return $receivedGroups;
        }
        else
        {
            throw new Exception('ERROR WHILE GETTING GROUPS', 500);
        }
    }

    public function getPersonasInGroup($groupId = NULL)
    {
        if (!is_null($groupId))
        {
            $personasId = [];
            $personas = [];

            $queryPersonasId = 'SELECT persona_id FROM Group_has_Personas WHERE group_id='. $groupId;
            if ($result = $this->conn->query($queryPersonasId))
            {
                while ($row = $result->fetch_assoc())
                {
                    array_push($personasId, $row['id']);
                }
                $result->free();
            }

            foreach ($personasId as $value)
            {
                $queryPersonas = 'SELECT id, name, last_name FROM Personas WHERE id='. $id;
                if ($result = $this->conn->query($queryPersonas))
                {
                    while ($row = $result->fetch_assoc())
                    {
                        array_push($personas, new Persona($row['id'], $row['name'], $row['last_name']));
                    }
                    $result->free();
                }
            }
            return $personas;
        }
        else
        {
            throw new Exception('GROUP ID WAS NULL', 500);
        }
    }

    public function insertAssistance($date = NULL, $assistance = NULL)
    {
        if (!is_null($date) && !is_null($assistance))
        {
            $stmt = $this->conn->prepare('INSERT INTO Assistance (persona_id, date, assistance_type) VALUES (?, ?, ?)');
            foreach ($assistance as $personaId => $personaAssistance) {
                $stmt->bind_param('isi', $personaId, $date, $personaAssistance);
                $stmt->execute();
            }
            $stmt->close();
        }
        else
        {
            throw new Exception('NULL PARAMETERS GIVEN', 500);
            
        }
    }
}
?>