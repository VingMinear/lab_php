<?php 
  $show=true;
  $active="active";
  $listSlides=array(
    "fruit1",
    "fruit2",
    "fruit3",
    "fruit4",
    "fruit5",
  );
  $titles=array(
    "Fruit salad",
    "Breakfast Fruit Salad",
    "TROPICAL FRUIT SALAD",
    "Honey Vanilla Fruit Salad",
    "Winter Fruit Salad",
  );
  $subtitle=array(
    "Look for ripe, sweet-smelling fruit for this simple fruit salad with kiwi, mango, pineapple, grapes, orange and berries. It’s a lovely, light summer dessert",
    "This easy breakfast fruit salad is perfect for mornings when you want a fresh, quick meal. It's also great as an afternoon snack!
    This simple, easy fruit salad recipe is made from cut fresh fruit and freshly-squeezed orange juice.
    It's a fast, healthy breakfast recipe for days you're in a hurry or can be a great side dish for a larger breakfast - serve it with eggs or some waffles for a filling meal!",
    "Tropical Fruit Salad is a light, refreshing dish that can be enjoyed as breakfast, snack, or dessert.",
    "Honey Vanilla Fruit Salad – Fresh chopped fruit coated in a sweet orange honey vanilla dressing.This recipe takes a short cut by using a jar of pre segmented mandarin oranges packed in fruit juice.  The oranges go into the fruit salad and the mandarin orange juice gets combined with honey and vanilla to make the dressing.",
    "If the colder weather has you in the doldrums, I have just the thing for you. This refreshing, healthy and easy Winter Fruit Salad is loaded with bright citrus flavor, like a bowl full of sunshine.
    When the weather outside is frightful, look to all the delightful fruits that fall and winter season offer to lighten your mood.",
  );
?>
<style>
.image{
height: 500px;
object-fit: contain;
width:500px ;
}
  
</style>
<section class="slider_section position-relative">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel"data-interval="2000">
    <div class="carousel-inner">
      <!---------------------------------------slide ------------------------------------->
      <?php
      for ($i=0;$i<count($listSlides);$i++) {
      ?>
        <div class="carousel-item <?php if($show){
          echo$active;
        }?>">
        
          <div class="slider_item-box">
            <div class="slider_item-container">
              <div class="container">
                <div class="row">
                  <div class="col-md-6">
                    <div class="slider_item-detail">
                      <div>
                        <!---------------------------------------title ------------------------------------->
                        <h1>
                        <?=$titles[$i]?>
                        </h1>
                        <!---------------------------------------end title ------------------------------------->

                        <!---------------------------------------subtitle ------------------------------------->
                        <p>
                          <?=$subtitle[$i]?>
                        </p>
                        <!---------------------------------------end subtitle ---------------------------------->
                        <div class="d-flex">
                          <a href="" class="text-uppercase custom_orange-btn mr-3">
                            Shop Now
                          </a>
                          <a href="index.php?page=contact" class="text-uppercase custom_dark-btn">
                            Contact Us
                          </a>
                        </div>
                      </div>
                    </div>
                  </div>
                  <!---------------------------------------Image Slide ------------------------------------->
                  <div class="col-md-6 ">
                    <div class="slider_img-box">
                      <div>
                        <img src="images/<?=$listSlides[$i]?>.png" alt="" class="image " />
                      </div>
                    </div>
                  </div>
                  <!-------------------------------------End Img Slide ------------------------------------->
                </div>
              </div>
            </div>
          </div>
        </div>
      <?php
      $show=false;
      }
      ?>
      <!---------------------------------------end slide ------------------------------------->
    </div>
    <!-- Next Slide -->
    <div class="custom_carousel-control">
      <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
        <span class="sr-only">Previous</span>
      </a>
      <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</section>