<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title><?php  echo $stand[0]['name']; ?></title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" type="Content/img/site_logo.png" href="Content/img/site_logo.png">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT Sans Narrow"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="Content/css/footer_style_forreservation.css"/>
        <link rel="stylesheet" type="text/css" href="Content/css/header_style_for_stand.css"/>
        <link rel="stylesheet" type="text/css" href="Content/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="Content/css/style.css">
        <link rel="stylesheet" type="text/css" href="Content/css/stand_style.css">
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
        <link rel="stylesheet" href="Content/css/responsive.css">
		<PackageReference Include="jQuery" Version="3.3.1" />
		<PackageReference Include="jQuery" Version="3.3.1" />
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
      <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src='Content/library/fullcalendar-6.0.2/dist/index.global.js'></script>
        <script src='Content/library/fullcalendar-6.0.2/dist/index.global.min.js'></script>
	</head>

    <script>


document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'fr',
    initialDate: '2023-05-25',
    initialView: 'timeGrid',
    height: 800,
    contentHeight: 2000,
    expandRows: true,
		slotMinTime: '09:00:00',
		slotMaxTime: '13:30:00',
    slotDuration: '00:15:00',
		allDaySlot: false,
    nowIndicator: true,
    headerToolbar:{
  start: 'title', // will normally be on the left. if RTL, will be on the right
  center: '',
  end: '' // will normally be on the right. if RTL, will be on the left
},
handleWindowResize: true,
navLinks: true, // can click day/week names to navigate views
    editable: true,
    selectable: true,
    selectMirror: false,
    dayMaxEvents: true, // allow "more" link when too many events
visibleRange: {
    start: '2023-05-25',
    end: '2023-05-26'
  },
  events: <?php echo json_encode($horaire); ?>
,
eventClick: function(info) {
  if(info.event.title == 'Indisponible'){
          $icon = 'warning';
          $info = 'Voir les autres créneaux';

        }
        else{
          $icon = 'info';
          $info = 'Réserver ce créneau';
          }
           $start = info.event.start.toString().substr(15, 15);
          $end = info.event.end.toString().substr(15, 15);
     Swal.fire({
       title: info.event.title,
        text: 'De  ' + $start + ' a ' + $end,
        icon: $icon,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: $info
      }).then((result) => {
        if (result.isConfirmed && info.event.title != 'Indisponible') {
          const params = new Proxy(new URLSearchParams(document.URL), {
          get: (searchParams, prop) => searchParams.get(prop),
          });
          let name = params.name;
          window.location.href = "?controller=reservation&action=do_reservation&name="+encodeURI(name)+"&id="+info.event.id;
        }
})
  }

});
  document.getElementById('Matin').addEventListener('click', function() {
    calendar.setOption('slotMinTime', '09:00:00');
    calendar.setOption('slotMaxTime', '13:30:00');

});
document.getElementById('Après-Midi').addEventListener('click', function() {
    calendar.setOption('slotMinTime', '13:30:00');
    calendar.setOption('slotMaxTime', '18:00:00');
});

document.getElementById('Jeudi').addEventListener('click', function() {
    calendar.setOption('visibleRange',
     { start: '2023-05-25',
    end: '2023-05-25' }
    );
});
document.getElementById('Vendredi').addEventListener('click', function() {
    calendar.setOption('visibleRange',
     { start: '2023-05-26',
    end: '2023-05-26' }
    );
});
  calendar.updateSize();
  calendar.render();
});

</script>
	<body>

    <header id='header'>
    <div href="#" id="cf">
      <a href="?controller=home">
        <img class="bottom" src="Content/img/Animath_after.png"/>
        <img class="top" src="Content/img/Animath.png" />
        </a>
    </div>
      <nav>
      <a href="?controller=reservation" class="link link--eirene"><span>Réservation</span></a>
      <a href="#" class="link link--eirene"><span>A propos de Nous</span></a>
        <img  onmouseenter="openlog()" onmouseleave="closelog()" class='login' src="Content/img/icon.png" />
      </span></a>
      <div id='pop' onmouseenter="openlog()" onmouseleave="closelog()">

        <button class="noselect" id='bar'><a href="?controller=myaccount"><span class='text'>Compte</span><span class="icon"></span></a></button>


        <button class="noselect" id='bar'><a href="?controller=deconnexion&action=deconnexion"><span class='text'>Déconnexion</span><span class="icon"></span></a></button>

      </div>
      </nav>
    </header>

<section class="slider_section">
            <div class="carousel-inner">
               <div class="carousel-item active">
                  <img class="first-slide" src="Content/img/666666.png" alt="First slide" style='opacity:0%;'>
                  <div class="container">
                     <div class="carousel-caption relative">
                        <h1 style="font-size: 55px; margin-bottom:220px; position:relative; top: 240px;"><?php  echo $stand[0]['name']; ?></h1>
                     </div>
                  </div>
               </div>
      </section>
<!-- about  -->
      <div id="about" class="about">
         <div class="container">
            <div class="row">
               <div class="col-md-12">
                  <div class="titlepage">
                     <h2>Description</h2>
                     <span><?php  echo $stand[0]['summary']; ?></span>
                  </div>
               </div>
            </div>
         </div>
         <div class="container-fluid">
         <input type="button" value="Matin" id='Matin' style='  margin-left:auto; ' />
        <input type="button" value="Après-Midi" id='Après-Midi'style='margin-left:auto; ' />
        <input type="button" value="Jeudi" id='Jeudi' style='  margin-left:auto; ' />
        <input type="button" value="Vendredi" id='Vendredi'style='margin-left:auto; ' />
         <div id='calendar' style='max-width: 1900px; margin: 80px 150px; padding-right:200px; '>

                </div>
          
      </div>
      <!-- end abouts -->

      <script>
function openlog() {
  document.getElementById("pop").style.visibility = "visible";
  document.getElementById("pop").style.opacity = 1;
}
function closelog() {
  document.getElementById("pop").style.visibility = "hidden";
  document.getElementById("pop").style.opacity = 0;
}
    </script>
      <?php
 require('view_end.php');
  ?>
