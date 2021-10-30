public function login($adminid) {
        $db = DatabaseConnection::getInstance()->getDb();
        $query = "SELECT * FROM admin WHERE adminID = ?";
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $adminid, PDO::PARAM_STR);
        $stmt->execute();

        $total = $stmt->rowCount();
        if ($total == 0) {
            return null;
        } else {
            $a = $stmt->fetch(PDO::FETCH_ASSOC);
            $adm = new Admin($a['adminID'], $a['password']);
            DatabaseConnection::closeConnection($db);
            return $adm;
        }
    }

    public function register(Admin $ad) {
        $db = DatabaseConnection::getInstance()->getDB();
        $query = 'INSERT INTO admin VALUES(?,?)';
        $stmt = $db->prepare($query);
        $stmt->bindParam(1, $ad->adminID, PDO::PARAM_STR);
        $stmt->bindParam(2, $ad->password, PDO::PARAM_STR);
        $stmt->execute();
        DatabaseConnection::closeConnection($db);
    }