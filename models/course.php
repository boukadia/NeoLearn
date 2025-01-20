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
      <input type='checkbox' name='tags[]' value='" . $tag['tagId'] . "'> " . $tag['tagName'] . "
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
                  <option value='" . $category['categoryId'] . "'> " . $category['categoryName'] . "</option>
      
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
                <h3>" . $courses['titre'] . "</h3>
                <img src='../../assests/images/" . $courses['photo'] . "' alt=''>
                <p>" . $courses['description'] . " </p>
                <p style='background-color:#69c869 ;padding:10px;border-radius:10px'>" . $courses['courseStatus'] . " </p>
                <a href='../../models/deleteCourse.php?courseId=" . $courses['courseId'] . "' class='btn'>delete</a>
                <a href='../../models/updateCourse.php?courseId=" . $courses['courseId'] . " ' class='btn'>update</a>
    </div>
            ";
        }
    }



    public function getAllCourses($userRole)
    {

        $connect = new Database();
        $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("SELECT users.userName,courses.courseId,courses.courseStatus,courses.titre,courses.description FROM courses  INNER JOIN users ON users.userId=courses.teacherId");
        $stmt->execute();
        if ($userRole == 'admin') {


            while ($courses = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo "
                <tr>
                <td>" . $courses['titre'] . "</td>
                <td>" . $courses['userName'] . "</td>
                <td>" . $courses['description'] . "</td>
                <td><span class='status active'>" . $courses['courseStatus'] . "</span></td>
                <td> <a style=text-decoration:none' href='../../models/softDeletCourse.php?courseId=" . $courses['courseId'] . "' class='btn'>delete</a>
                <a href='../../models/switch.php?courseId=" . $courses['courseId'] . "' class='btn'>switch</a></td>
                </tr>
                ";
            }
        } else if ($userRole == 'student') {
            $stmt = $this->pdo->prepare("SELECT users.userId,users.userName,courses.courseId,courses.courseStatus,courses.titre,courses.description,courses.photo FROM courses  INNER JOIN users ON users.userId=courses.teacherId && courseStatus='active'");
            $stmt->execute();

            while ($course = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($course['courseStatus'] == 'active') {


                    echo "
                <div style='background-color:#ffcc80;flex-wrap:wrap' class='course-item'>
                    <img src='../../assests/images/" . $course['photo'] . "' alt='Cours HTML'>
                    <h3>" . $course['titre'] . "</h3>
                    <p>" . $course['description'] . "</p>
                    <p style='text-align:left;color:red'>Pr." . $course['userName'] . "</p>
                    <a href='../../models/addMyCourse.php?userId=" . $course['userId'] . "&&courseId=" . $course['courseId'] . "' class='btn'>s'inscrire</a>
                </div>
                ";
                }
            }
        } else {
            $stmt = $this->pdo->prepare("SELECT users.userId,users.userName,courses.courseId,courses.courseStatus,courses.titre,courses.description,courses.photo FROM courses  INNER JOIN users ON users.userId=courses.teacherId && courseStatus='active'");
            $stmt->execute();

            while ($course = $stmt->fetch(PDO::FETCH_ASSOC)) {
                if ($course['courseStatus'] == 'active') {
                    echo "
          <div class='card'>
            <img src='../assests/images/" . $course['photo'] . "' alt='Course 1'>
            <h3>" . $course['titre'] . "</h3>
                    <p>" . $course['description'] . "</p>
                    <p style='text-align:left;color:red'>Pr." . $course['userName'] . "</p>
                    <a href='login.html' class='btn'>s'inscrire</a>
                            </div> ";
                }
            }
        }
    }




    public function rechercheCourse($mots)
    {
        $connect = new Database();

        $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("SELECT users.userId,users.userName,courses.courseId,courses.courseStatus,courses.titre,courses.description,courses.photo FROM courses  INNER JOIN users ON (users.userId=courses.teacherId && courseStatus='active') where courses.titre like ?");
        $mot = "%" . $mots . "%";
        $stmt->execute(params: [$mot]);
        while ($course = $stmt->fetch(PDO::FETCH_ASSOC)) {
            if ($course['courseStatus'] == 'active') {


                echo "
               
            <div style='background-color:#ffcc80;flex-wrap:wrap' class='course-item'>
                <img src='../assests/images/" . $course['photo'] . "' alt='Cours HTML'>
                <h3>" . $course['titre'] . "</h3>
                <p>" . $course['description'] . "</p>
                <p style='text-align:left;color:red'>Pr." . $course['userName'] . "</p>
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
         FROM enrollments INNER JOIN courses ON enrollments.courseId=courses.courseId 
        inner JOIN users ON enrollments.studentId=users.userId
         inner JOIN category ON courses.categoryId = category.categoryId
    
     WHERE enrollments.studentId = ?;");
        $stmt->execute([$studentId]);
        $course = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $nbreElementParPage = 3;
        $nbreCourse = count($course);
        $nbrePages = ceil($nbreCourse / $nbreElementParPage);
        $debut = ($page - 1) * $nbreElementParPage;


        $stmt = $this->pdo->prepare("SELECT courses.titre,courses.content,courses.description,courses.photo,users.userName,
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

        $this->pdo = $connect->connect();
        $stmt = $this->pdo->prepare("SELECT * FROM enrollments");
        $stmt->execute();
        $courses = $stmt->fetchAll(PDO::FETCH_ASSOC);
        foreach ($courses as $course) {
            if ($courseId == $course['courseId']) {
                echo "you are   already enroll in this course";
                return $course['courseId'];
            }
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
    // ================================pagination===============================


}
