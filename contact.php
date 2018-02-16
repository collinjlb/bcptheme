<?php
/**
* Template Name: Contact
*
* contact.php
*
*/
get_header(); ?>

<div id="primary" class="content-area contact">
  <div id="content" class="site-content" role="main">
    <?php get_template_part('/components/header/child-header'); ?>

    <div style="height: 400px" id="map"></div>
    <script>
      function initMap() {
        var bcp = {lat: 36.1246085, lng: -86.8465782};
        var map = new google.maps.Map(document.getElementById('map'), {
          zoom: 15,
          center: bcp,
          styles: [
    {
        "featureType": "water",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#e9e9e9"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "landscape",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 17
            }
        ]
    },
    {
        "featureType": "road.highway",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 29
            },
            {
                "weight": 0.2
            }
        ]
    },
    {
        "featureType": "road.arterial",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 18
            }
        ]
    },
    {
        "featureType": "road.local",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "featureType": "poi",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f5f5f5"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "featureType": "poi.park",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#dedede"
            },
            {
                "lightness": 21
            }
        ]
    },
    {
        "elementType": "labels.text.stroke",
        "stylers": [
            {
                "visibility": "on"
            },
            {
                "color": "#ffffff"
            },
            {
                "lightness": 16
            }
        ]
    },
    {
        "elementType": "labels.text.fill",
        "stylers": [
            {
                "saturation": 36
            },
            {
                "color": "#333333"
            },
            {
                "lightness": 40
            }
        ]
    },
    {
        "elementType": "labels.icon",
        "stylers": [
            {
                "visibility": "off"
            }
        ]
    },
    {
        "featureType": "transit",
        "elementType": "geometry",
        "stylers": [
            {
                "color": "#f2f2f2"
            },
            {
                "lightness": 19
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.fill",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 20
            }
        ]
    },
    {
        "featureType": "administrative",
        "elementType": "geometry.stroke",
        "stylers": [
            {
                "color": "#fefefe"
            },
            {
                "lightness": 17
            },
            {
                "weight": 1.2
            }
        ]
    }
]
        });
        var marker = new google.maps.Marker({
          position: bcp,
          map: map,
          icon: 'http://jlbdev1.net/bcpgroup/public_html/wp-content/uploads/2018/01/map-marker-3.png',
          url: 'https://goo.gl/maps/8uXhhP8PYUn'
        });

        google.maps.event.addListener(marker, 'click', function() {
          window.open(marker.url);
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBplaMVAjZZ-i8Xk623y9r6ZMDdOST3Zbg&callback=initMap">
    </script>

    <div class="contact-container">
      <div class="contact-social">
        <div class="social-icons">
          <article class="linkedin col-md-2">
            <a href="<?php the_field('linkedin','option'); ?>"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
            <h6>linkedin</h6>
          </article>
          <article class="google col-md-2">
            <a href="<?php the_field('google_plus','option'); ?>"><i class="fa fa-google-plus" aria-hidden="true"></i></a>
            <h6>google+</h6>
          </article>
        </div>
      </div>

      <div class="contact-directly">
        <h2>Contact <span>Us</span> Directly</h2>
        <div class="form col-md-8">
          <?php echo do_shortcode('[gravityform id="1" title="false" ajax="true" description="false"]'); ?>
        </div>
      </div>

      <div class="more-info">
        <img src="http://jlbdev1.net/bcpgroup/public_html/wp-content/uploads/2018/01/design-element.png" alt="Divider Element">
        <h3>Want more information about bcp group?</h3>
        <div class="contact">
          <?php if ( have_rows('contacts') ): ?>
            <?php while ( have_rows('contacts') ): the_row();
            // vars
            $name = get_sub_field('name');
            $title = get_sub_field('title');
            $phone = get_sub_field('phone');
            $email = get_sub_field('email');
            ?>
            <div class="info">
              <p class="name"><?php echo $name; ?></p>
              <p class="title"><?php echo $title; ?></p>
              <p><a href="tel:<?php echo $phone; ?>"><?php echo $phone; ?></a></p>
              <p><a href="mailto:<?php echo $email; ?>"><?php echo $email; ?></a></p>
            </div>
            <?php endwhile; ?>
          <?php endif; ?>
        </div>
      </div>
    </div>

  </div><!-- #content -->
</div><!-- #primary -->

<?php get_footer();?>
