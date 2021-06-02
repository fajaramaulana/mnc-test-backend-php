<?php
class Article
{
    private $host = "localhost";
    private $username   = "root";
    private $password   = "";
    private $dbname   = "mnc_test";
    public  $conn;

    // Database Connection 
    public function __construct()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if (mysqli_connect_error()) {
            trigger_error("Failed to connect to MySQL: " . mysqli_connect_error());
        } else {
            return $this->conn;
        }
    }

    // Show Article
    public function showData()
    {
        $query = "SELECT * FROM article ORDER BY publish_date desc";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $data = array();
            while ($row = $result->fetch_assoc()) {
                $data[] = $row;
            }
            return $data;
        } else {
            echo "Error!";
        }
    }

    // create Article
    public function createArticle($post)
    {
        $title = $this->conn->real_escape_string($_POST['title']);
        $description = $this->conn->real_escape_string($_POST['description']);
        $content = $this->conn->real_escape_string($_POST['content']);
        $publish_date = $this->conn->real_escape_string($_POST['date']);
        var_dump($publish_date);
        $query = "INSERT INTO article(title,description,content,publish_date) VALUES('$title','$description','$content','$publish_date')";
        $sql = $this->conn->query($query);
        if ($sql == true) {
            header("Location:index.php?msg1=insert");
        } else {
            echo "Create Article Failed!";
        }
    }

    // GET ARTICLE BY ID
    public function getArticleById($id)
    {
        $query = "SELECT * FROM article WHERE id = '$id'";
        $result = $this->conn->query($query);
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return $row;
        } else {
            echo "Article not found!";
        }
    }

    // Update Article
    public function updateArticle($postData)
    {
        $title = $this->conn->real_escape_string($_POST['title']);
        $description = $this->conn->real_escape_string($_POST['description']);
        $content = $this->conn->real_escape_string($_POST['content']);
        $publish_date = $this->conn->real_escape_string($_POST['date']);
        $id = $this->conn->real_escape_string($_POST['id']);
        if (!empty($id) && !empty($postData)) {
            $query = "UPDATE article SET title = '$title', description = '$description', content = '$content', publish_date = '$publish_date' WHERE id = '$id'";
            var_dump($query);
            $sql = $this->conn->query($query);
            if ($sql == true) {
                header("Location:index.php?msg2=update");
            } else {
                echo "Update Article Failed!";
            }
        }
    }

    // search filter article

    public function searchArticle()
    {
        $terms = $this->conn->real_escape_string($_POST['s_keyword']);
        $query = "SELECT * FROM article WHERE title REGEXP ? OR description REGEXP ? OR content REGEXP ? ORDER BY id DESC";
        $stmt = $this->conn->prepare($query);
        $stmt->bind_param("sss", $terms, $terms, $terms );       // insert your variable into the placeholder (still need to add % wildcards)
        $stmt->execute();
        $res1 = $stmt->get_result();

        return $res1;
    }

    // Delete Article
    public function deleteArticle($id)
    {
        $query = "DELETE FROM article WHERE id = '$id'";
        $sql = $this->conn->query($query);
        if ($sql == true) {
            header("Location:index.php?msg3=delete");
        } else {
            echo "Delete Article Failed!";
        }
    }
}
