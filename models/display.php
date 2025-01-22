<?php
include_once($_SERVER['DOCUMENT_ROOT'] . '/youdemy/models/course.php');
class Video extends Course
{
    private $type;


    public function affichageContenu($url, $type)
    {
        // $content=parent::getContent();
        if ($type == "video") {
            echo "
            <div class='video-wrapper'>
                <div class='video-placeholder'>
                     
                      <div>
                       <iframe src={$url} width='560' height='315' frameborder='0' allowfullscreen></iframe>
                      </div>
                </div>
            </div>

            ";
        } else {
            echo "<div class='course-details'>
                <h1 class='course-title'>Introduction</h1>

                <div class='instructor'>
                    <div class='instructor-avatar'>
                        <img style='width: 50px; border-radius:50%;height:50px ' src='../../assests/images/react.png' alt='Photo de l'instructeur'>
                       
                    </div>
                    <div class='instructor-info'>
                       
                    </div>
                </div>

               
              

                <a href='$url' class='cta-button'>Continuer vers le cours</a>
            </div>";

            




            // 
        }
    }
}
