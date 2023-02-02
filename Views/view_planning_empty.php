<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8"/>
		<title>Creation Compte</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!DOCTYPE svg PUBLIC "-//W3C//DTD SVG 20010904//EN"
        "http://www.w3.org/TR/2001/REC-SVG-20010904/DTD/svg10.dtd">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=PT Sans Narrow"/>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"/>
    <link rel="stylesheet" type="text/css" href="Content/css/form_style.css"/>
    <link rel="stylesheet" type="text/css" href="Content/css/header_style.css"/>
    <link rel="stylesheet" type="text/css" href="Content/css/myaccount_style.css"/>
    <link rel="stylesheet" type="text/css" href="Content/css/home_style.css"/>
        <link rel="stylesheet" type="text/css" href="Content/css/header_style.css"/>
        <link rel="stylesheet" type="text/css" href="Content/css/bootstrap.min.css">

        <link rel="stylesheet" href="Content/css/responsive.css">
        <link rel="stylesheet" href="Content/css/planning_style.css">
		<PackageReference Include="jQuery" Version="3.3.1" />
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script src='Content/library/fullcalendar-6.0.2/dist/index.global.js'></script>
        <script src='Content/library/fullcalendar-6.0.2/dist/index.global.min.js'></script>
        <script>


document.addEventListener('DOMContentLoaded', function() {
  var calendarEl = document.getElementById('calendar');
  var calendar = new FullCalendar.Calendar(calendarEl, {
    locale: 'fr',
    initialDate: '2022-10-13',
    initialView: 'timeGrid',
    height: 1700,
    contentHeight: 2000,
    expandRows: true,
		slotMinTime: '09:00:00',
		slotMaxTime: '13:30:00',
    slotDuration: '00:15:00',
		allDaySlot: false,
    nowIndicator: true,
    headerToolbar:{
  start: '', // will normally be on the left. if RTL, will be on the right
  center: '',
  end: 'prev,next' // will normally be on the right. if RTL, will be on the left
},
handleWindowResize: true,
navLinks: true, // can click day/week names to navigate views
    editable: false,
    selectable: true,
    selectMirror: false,
    dayMaxEvents: true, // allow "more" link when too many events
visibleRange: {
    start: '2022-10-13',
    end: '2022-10-13'
  },

eventClick: function(info) {
	sResume = info.event.title;
				sResume = sResume.replace(/\n|\r/g, '<br>');
				const sDateDebut = new Date(info.event.start);
				sDate = '<div class="jourTextHolder">' + aJourTexte[sDateDebut.getDay()] + '</div><div class="jourHolder">' + sDateDebut.getDate() + '</div><div class="moisTextHolder">' + aMoisTexte[sDateDebut.getMonth()] + '</div><div class="anneeHolder">' +  sDateDebut.getFullYear() + '</div>';
				sHeureDebut = sDateDebut.getHours() + "h" +  (sDateDebut.getMinutes()<10 ? '0'+sDateDebut.getMinutes() : sDateDebut.getMinutes());
				const sDateFin = new Date(info.event.end);
				sHeureFin = sDateFin.getHours() + "h" +  (sDateFin.getMinutes()<10 ? '0'+sDateFin.getMinutes() : sDateFin.getMinutes());

				sCode = '<div class="row"><div class="col s4 colDate">' + sDate + '</div><div class="col s8 colResume"><div class="horaireHolder">de ' + sHeureDebut + " à " + sHeureFin + '</div><div class="resumeHolder">' + sResume + '</div></div></div>';
				$("#ModalCalendar .modal-content").html(sCode);
				$("#ModalCalendar").modal("open");
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
     { start: '2022-10-13',
    end: '2022-10-13' }
    );
});
document.getElementById('Vendredi').addEventListener('click', function() {
    calendar.setOption('visibleRange', 
     { start: '2022-10-14',
    end: '2022-10-14' }
    );
});
  calendar.updateSize();
  calendar.render();
});
</script>
<script>
  var myEvents = [];

$.each( $( '.event' ), function( event ) {
  myEvents.push( {
    title : event.find( '.title' ).val(),
    start : event.find( '.start' ).val(),
    end : event.find( '.end' ).val(),
  } );  
} );

$myCal.fullCalendar( 'addEventSource', myEvents );
</script>
	</head>
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

        <button class="noselect"><a href="?controller=myaccount"><span class='text'>Compte</span><span class="icon"></span></a></button>


        <button class="noselect"><a href="?controller=deconnexion&action=deconnexion"><span class='text'>Déconnexion</span><span class="icon"></span></a></button>

      </div>
      </nav>
    </header>



    
    <div class="app-container">
        
  <div class="sidebar">
    <div class="sidebar-header">
    <div class="app-icon">
        <h3>Gestion du compte</h3>
      </div>
    </div>
    <ul class="sidebar-list">
      <li class="sidebar-list-item">
        <a href="?controller=myaccount">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
          <span>Informations Personnelles</span>
        </a>
      </li>
      <li class="sidebar-list-item active">
        <a href="?controller=myaccount&action=planning">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-bag"><path d="M6 2L3 6v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2V6l-3-4z"/><line x1="3" y1="6" x2="21" y2="6"/><path d="M16 10a4 4 0 0 1-8 0"/></svg>
          <span>Mes Réservations</span>
        </a>
      </li>
      <li class="sidebar-list-item">
        <a href="#">
          <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-bell"><path d="M18 8A6 6 0 0 0 6 8c0 7-3 9-3 9h18s-3-2-3-9"/><path d="M13.73 21a2 2 0 0 1-3.46 0"/></svg>
          <span>Notifications</span>
        </a>
      </li>
    </ul>
    <div class="account-info">
      <div class="account-info-picture">
        <img src="Content/img/icon_after.png" alt="Account">
      </div>
      <a href="?controller=deconnexion">
      <div class="account-info-name">Déconnexion</div>
      </a>

    </div>
  </div>
  
  <div class="app-content">
    <div class="app-content-header">
      <h1 class="app-content-headerText">Mes Réservations</h1>
      

      </div>

      <input type="button" value="Matin" id='Matin' style='  margin-left:auto; ' />
      <input type="button" value="Après-Midi" id='Après-Midi'style='margin-left:auto; ' />
      <input type="button" value="Jeudi" id='Jeudi' style='  margin-left:auto; ' />
      <input type="button" value="Vendredi" id='Vendredi'style='margin-left:auto; ' />
					<div id='calendar' style='max-width: 1900px; margin: 80px 150px; padding-right:200px; '>
                    
          <div id="all-events">
          <div class="event">
          
  </div>
</div>
    </div>
	 </div>
 </div>







</div>
   
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
require('view_end.php')
?>
