<?php
require_once($_SERVER['DOCUMENT_ROOT'] . './youdemy/config/database.php');
class Course
{
    private $titre;
    private $content;
    private $description;
    private $tagId;
    private $enseignantId;
    private $photo;
    private $type;
    private $pdo;


    public function __construct()
    {
        $connect = new Database();
        $this->pdo = $connect->connect();
        $this->content;
    }

    public function getContent()
    {
        return $this->content;
    }
    public function addCourse($titre, $description, $content, $photo, $userId, $categoryId, $tags, $type)
    {
        $connect = new Database();
        $this->pdo = $connect->connect();
        // $stmt=$pdo->prepare("SELECT * FROM tags");
        // $stmt->execute();

        // while (  $tag=$stmt->fetch(PDO::FETCH_ASSOC)){
        //     echo "
        //     <label>
        //   <input type='checkbox' name='tags[]' value='".$tag['tagId']."'> SEO
        // </label>
        //     ";
        // }
        $stmt = $this->pdo->prepare("INSERT INTO courses (titre,description,content,photo,teacherId,categoryId,type) VALUES (?,?,?,?,?,?,?)");
        $stmt->execute([$titre, $description, $content, $photo, $userId, $categoryId, $type]);
        $courseId = $this->pdo->LastInsertId();
        $tagss = $tags;
        foreach ($tagss as $tag) {

            $stmt = $this->pdo->prepare("INSERT INTO courseTags (tagId,courseId) values(?,?)");
            $stmt->execute([$tag, $courseId]);
        }
        header("location:./affichageCourses.php");
    }


    public function getTags()
    {
        $connect = new Database();
        $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("SELECT * FROM tags");
        $stmt->execute();

        while ($tag = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "
        <label>
      <input type='checkbox' name='tags[]' value='" . htmlspecialchars($tag['tagId'])  . "'> " . htmlspecialchars($tag['tagName']) . "
    </label>
        ";
        }
    }
    public function getCategory()
    {
        $connect = new Database();
        $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("SELECT * FROM category");
        $stmt->execute();

        while ($category = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "
                  <option value='" . htmlspecialchars($category['categoryId'])  . "'> " . htmlspecialchars($category['categoryName'])  . "</option>
      
        ";
        }
    }
    public function getCourses($teacherId)
    {

        $connect = new Database();
        $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("SELECT * FROM courses where teacherId=? ");
        $stmt->execute([$teacherId]);
        // echo" <pre>";
        while ($courses = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "
                <div class='card'>
                <h3>" . htmlspecialchars($courses['titre'])  . "</h3>
                <img src='../../assests/images/" . htmlspecialchars($courses['photo'])  . "' alt=''>
                <p>" . htmlspecialchars($courses['description']) . " </p>
                <p style='background-color:#69c869 ;padding:10px;border-radius:10px'>" . htmlspecialchars($courses['courseStatus'])  . " </p>
                <a href='../../models/deleteCourse.php?courseId=" . htmlspecialchars($courses['courseId'])  . "' class='btn'>delete</a>
                <a href='../../models/updateCourse.php?courseId=" . htmlspecialchars($courses['courseId'])  . " ' class='btn'>update</a>
    </div>
            ";
        }
    }



    public function getAllCourses($userRole, $page)
    {

        $connect = new Database();
        $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("SELECT users.userName,courses.courseId,courses.courseStatus,courses.titre,courses.description FROM courses  INNER JOIN users ON users.userId=courses.teacherId");
        $stmt->execute();
        $nbr = $stmt->fetchAll(pdo::FETCH_ASSOC);

        $nbreCourse = count($nbr);


        // echo $nbreCourse;
        $nbreElementParPage = 8;

        $nbrePages = ceil($nbreCourse / $nbreElementParPage);
        $debut = ($page - 1) * $nbreElementParPage;
        $stmt = $this->pdo->prepare("SELECT users.userName,courses.courseId,courses.courseStatus,
courses.titre,courses.description FROM courses  INNER JOIN users ON 
users.userId=courses.teacherId LIMIT $debut,$nbreElementParPage ");
        $stmt->execute();
        $_SESSION['nbrePages'] = $nbrePages;
        $_SESSION['nbreCourses'] = $nbreCourse;


        if ($userRole == 'admin') {


            while ($courses = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "
                <tr>
                <td>" . htmlspecialchars($courses['titre'])  . "</td>
                <td>" . htmlspecialchars($courses['userName'])  . "</td>
                <td>" . htmlspecialchars($courses['description'])  . "</td>
                <td><span class='status active'>" . htmlspecialchars($courses['courseStatus'])  . "</span></td>
                <td> <a style=text-decoration:none' href='../../models/softDeletCourse.php?courseId=" . htmlspecialchars($courses['courseId'])  . "' class='btn'>delete</a>
                <a href='../../models/switch.php?courseId=" . htmlspecialchars($courses['courseId']) . "' class='btn'>switch</a></td>
                </tr>
                ";
                // return $stmt->fetch(PDO::FETCH_ASSOC);
            }
        } else if ($userRole == 'student') {
            // session_start();
            // $_SESSION['userId'];
            $stmt = $this->pdo->prepare("SELECT users.userId,users.userName,courses.courseId,courses.courseStatus,courses.titre,courses.description,courses.photo FROM courses  INNER JOIN users ON users.userId=courses.teacherId && courseStatus='active' LIMIT $debut,$nbreElementParPage");
            $stmt->execute();
            // $nbre=($stmt->fetch(PDO::FETCH_ASSOC)) ;


            while ($course = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($course['courseStatus'] == 'active') {




                    echo "
                <div style='background-color:#ffcc80;flex-wrap:wrap' class='course-item'>
                    <img src='../../assests/images/" . htmlspecialchars($course['photo'])  . "' alt='Cours HTML'>
                    <h3>" . htmlspecialchars($course['titre']) . "</h3>
                    <p>" . htmlspecialchars($course['description'])  . "</p>
                    <p style='text-align:left;color:red'>Pr." . htmlspecialchars($course['userName'])  . "</p>
                    <a href='../../models/addMyCourse.php?userId=" . htmlspecialchars($_SESSION['userId']) . "&&courseId=" . htmlspecialchars($course['courseId']) . "' class='btn'>s'inscrire</a>
                </div>
                ";
                    // return $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        } else {
            $stmt = $this->pdo->prepare("SELECT users.userId,users.userName,courses.courseId,courses.courseStatus,courses.titre,courses.description,courses.photo FROM courses  INNER JOIN users ON users.userId=courses.teacherId && courseStatus='active' LIMIT $debut,$nbreElementParPage");
            $stmt->execute();

            while ($course = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($course['courseStatus'] == 'active') {
                    echo "
          <div class='card'>
            <img src='../assests/images/" . htmlspecialchars($course['photo'])  . "' alt='Course 1'>
            <h3>" . htmlspecialchars($course['titre']) . "</h3>
                    <p>" . htmlspecialchars($course['description']) . "</p>
                    <p style='text-align:left;color:red'>Pr." . htmlspecialchars($course['userName'])  . "</p>
                    <a href='login.html' class='btn'>s'inscrire</a>
                            </div> ";
                    // return $stmt->fetch(PDO::FETCH_ASSOC);
                }
            }
        }
        // return $nbrePages;
    }




    public function rechercheCourse($mots, $page)
    {
        $connect = new Database();

        $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("SELECT users.userId,users.userName,courses.courseId,courses.courseStatus,courses.titre,courses.description,courses.photo FROM courses  INNER JOIN users ON (users.userId=courses.teacherId && courseStatus='active') where courses.titre like ?");
        $mot = "%" . $mots . "%";
        $stmt->execute(params: [$mot]);
        $course = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nbreElementParPage = 8;
        $nbreCourse = count($course);
        $nbrePages = ceil($nbreCourse / $nbreElementParPage);
        $debut = ($page - 1) * $nbreElementParPage;
        $_SESSION['nbrePages'] = $nbrePages;

        $stmt = $this->pdo->prepare("SELECT users.userId,users.userName,courses.courseId,courses.courseStatus,courses.titre,courses.description,courses.photo 
        FROM courses  INNER JOIN users ON (users.userId=courses.teacherId && courseStatus='active') 
        where courses.titre like ? LIMIT $debut,$nbreElementParPage ");
        $mot = "%" . $mots . "%";
        $stmt->execute(params: [$mot]);
        while ($course = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($course['courseStatus'] == 'active') {


                echo "
               
            <div style='background-color:#ffcc80;flex-wrap:wrap' class='course-item'>
                <img src='../assests/images/" . htmlspecialchars($course['photo'])  . "' alt='Cours HTML'>
                <h3>" . htmlspecialchars($course['titre'])  . "</h3>
                <p>" . $course['description'] . "</p>
                <p style='text-align:left;color:red'>Pr." . htmlspecialchars($course['userName']) . "</p>
                <a href='login.html' class='btn'>s'inscrire</a>
            </div>
            ";
            }
        }
    }



    public function getMyCourses($studentId, $page)
    {
        $connect = new Database();
        $this->pdo = $connect->connect();


        $stmt = $this->pdo->prepare("SELECT courses.titre,courses.content,courses.description,courses.photo,users.userName,
        enrollments.studentId,enrollments.courseId, category.categoryName
        FROM enrollments 
        INNER JOIN courses ON enrollments.courseId=courses.courseId 
        inner JOIN users ON enrollments.studentId=users.userId
        inner JOIN category ON courses.categoryId = category.categoryId
        WHERE enrollments.studentId = ?;");
        $stmt->execute([$studentId]);
        $course = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nbreCourse = count($course);/* count */

        $nbreElementParPage = 8;
        $nbrePages = ceil($nbreCourse / $nbreElementParPage);
        $debut = ($page - 1) * $nbreElementParPage;


        $stmt = $this->pdo->prepare("SELECT courses.titre,courses.type,courses.content,courses.description,courses.photo,users.userName,
        enrollments.studentId,enrollments.courseId, category.categoryName
         FROM enrollments INNER JOIN courses ON enrollments.courseId=courses.courseId 
        inner JOIN users ON enrollments.studentId=users.userId
         inner JOIN category ON courses.categoryId = category.categoryId
    
     WHERE enrollments.studentId = ?
     LIMIT $debut,$nbreElementParPage
     ;");
        $stmt->execute([$studentId]);




        return ([$stmt->fetchAll(PDO::FETCH_ASSOC), $nbrePages]);



        // var_dump($user);
        // $_SESSION[''];


    }
    public function enrollments($studentId, $courseId)
    {
        $connect = new Database();
        var_dump($studentId);
        $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("SELECT * FROM enrollments WHERE studentId = ? AND courseId = ? ");
        $stmt->execute([$studentId, $courseId]);
        $courses = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($courses) {
            echo "you are   already enroll in this course";
            return;
        }

        $stmt = $this->pdo->prepare("INSERT INTO enrollments(studentId,courseId) VALUES(?,?)");
        $stmt->execute([$studentId, $courseId]);
    }

    //    ======================soft delete pour admin=================================

    public function softDeleteCourse($courseId)
    {
        $connect = new Database();
        $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("UPDATE courses SET courseStatus=? where courseId=? ");
        $stmt->execute(["desactive", $courseId]);
    }
    // ====================================================
    // ====================================================

    public function deleteCourse($courseId)
    {
        $connect = new Database();
        $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("DELETE FROM enrollments where courseId=? ");
        $stmt->execute([$courseId]);
        $stmt = $this->pdo->prepare("DELETE FROM courseTags where courseId=? ");
        $stmt->execute([$courseId]);

        $stmt = $this->pdo->prepare("DELETE FROM courses where courseId=? ");
        $stmt->execute([$courseId]);
    }


    public function updateCourses($courseId, $titre, $description, $content, $photo, $userId, $categoryId, $tags, $type)
    {
        $connect = new Database();
        $this->pdo = $connect->connect();

        $stmt = $this->pdo->prepare("delete from courseTags where courseId=?");
        $stmt->execute([$courseId]);

        $stmt = $this->pdo->prepare("UPDATE   courses SET titre=?,description=?,content=?, photo=?, teacherId=?, categoryId=?, type=? where courseId=? ");
        $stmt->execute([$titre, $description, $content, $photo, $userId, $categoryId, $type, $courseId]);

        $tagss = $tags;
        foreach ($tagss as $tag) {
            $stmt = $this->pdo->prepare("INSERT INTO courseTags (tagId,courseId) values(?,?)");
            $stmt->execute([$tag, $courseId]);
        }
        header("location:../views/enseignant/affichageCourses.php");
    }
    public function switchActive($courseId)
    {
        $connect = new Database();
        $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("UPDATE courses SET courseStatus=CASE
    WHEN courseStatus='desactive' THEN 'active' ELSE 'desactive' END WHERE courseId=?");
        return $stmt->execute([$courseId]);
    }
    // ================================affichage du contenu du coures==============================
    public function affichageContenu($url,$type)
    {

        echo $this->content;
    }
    
}
