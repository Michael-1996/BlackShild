@php

use Carbon\Carbon;

@endphp
<script>
function  initCalendar(){

  $(function () {

    /* initialize the external events
     -----------------------------------------------------------------*/
    function init_events(ele) {
      ele.each(function () {

        // create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
        // it doesn't need to have a start or end
        var eventObject = {
          title: $.trim($(this).text()) // use the element's text as the event title
        }

        // store the Event Object in the DOM element so we can get to it later
        $(this).data('eventObject', eventObject)

        // make the event draggable using jQuery UI
        $(this).draggable({
          zIndex        : 1070,
          revert        : true, // will cause the event to go back to its
          revertDuration: 0  //  original position after the drag
        })

      })
    }

    init_events($('#external-events div.external-event'))

    /* initialize the calendar
     -----------------------------------------------------------------*/
    //Date for the calendar events (dummy data)
    var date = new Date()
    var d    = date.getDate(),
        m    = date.getMonth(),
        y    = date.getFullYear()
    $('#calendar').fullCalendar({
      header    : {
        left  : 'prev,next today',
        center: 'title',
        right : 'month,agendaWeek,agendaDay'
      },
      buttonText: {
        today: 'today',
        month: 'month',
        week : 'week',
        day  : 'day'
      },
      // timeZone: 'GMT',
      //Random default events
      events    : [
        @isset($plannings)
          @foreach($plannings as $planning)
          {
            planning_id    : "{{$planning->id}}",
            title          : ("{{$planning->site->nom}}").replace('&amp;','&')+' ({{$planning->heure_debut.' - '.$planning->heure_fin}})',
            start          : new Date(20{{Carbon::create($planning->date_debut)->format('y')}}, {{Carbon::create($planning->date_debut)->format('m')-1}}, {{Carbon::create($planning->date_debut)->format('d')}}),
            end            : new Date(20{{Carbon::create($planning->date_debut)->format('y')}}, {{Carbon::create($planning->date_debut)->format('m')-1}}, {{Carbon::create($planning->date_fin)->format('d')+1}}),
            backgroundColor: '#0073b7', //red
            borderColor    : '#0073b7' //red
          },
          @endforeach
        @endisset
        // {
        //   title          : 'Planning',
        //   start          : new Date(2018, 0, 11),
        //   end            : new Date(2018, 0, 15),
        //   backgroundColor: '#f56954', //red
        //   borderColor    : '#f56954' //red
        // },
        // {
        //   title          : 'Long Event',
        //   start          : new Date(y, m, d - 5),
        //   end            : new Date(y, m, d - 2),
        //   backgroundColor: '#f39c12', //yellow
        //   borderColor    : '#f39c12' //yellow
        // },
        // {
        //   title          : 'Meeting Sana',
        //   start          : new Date(y, m, d, 10, 30),
        //   allDay         : false,
        //   backgroundColor: '#0073b7', //Blue
        //   borderColor    : '#0073b7' //Blue
        // },
        // {
        //   title          : 'Lunch',
        //   start          : new Date(y, m, d, 12, 0),
        //   end            : new Date(y, m, d, 14, 0),
        //   allDay         : false,
        //   backgroundColor: '#00c0ef', //Info (aqua)
        //   borderColor    : '#00c0ef' //Info (aqua)
        // },
        // {
        //   title          : 'Birthday Party',
        //   start          : new Date(y, m, d + 1, 19, 0),
        //   end            : new Date(y, m, d + 1, 22, 30),
        //   allDay         : false,
        //   backgroundColor: '#00a65a', //Success (green)
        //   borderColor    : '#00a65a' //Success (green)
        // },
        // {
        //   title          : 'Click for Google',
        //   start          : new Date(y, m, 28),
        //   end            : new Date(y, m, 29),
        //   url            : 'http://google.com/',
        //   backgroundColor: '#3c8dbc', //Primary (light-blue)
        //   borderColor    : '#3c8dbc' //Primary (light-blue)
        // }
      ],
      editable  : true,
      droppable : true, // this allows things to be dropped onto the calendar !!!
      eventResize: function(info) {
        alert('Bonjour')
        alert(info.event.title + " end is now " + info.event.end.toISOString());

        if (!confirm("is this okay?")) {
          info.revert();
        }
      },
      // eventRender: function(event, element) {
      //       element.append( "<span class='closeon'>supprimer</span>" );
      //       element.find(".closeon").click(function() {
      //          alert(event._id)
      //          $('#calendar').fullCalendar('removeEvents',event._id);
      //       });
      // },
      // eventClick: function(event, element, view) {
      //   alert('Bonjour')
      //   if (event.planning_id) {
      //       var event =  $("#calendar").fullCalendar('clientEvents',event._id);
      //       event.remove();
      //   }
      // },
      eventRender: function (event, element, view) {
        // alert(view.listenerId)
        // alert(Object.getOwnPropertyNames(view));

        element.html(event.title + '<span class=" pull-right '+event._id+'"></span>');

          // element.html(event.title + '<span class=" pull-right '+event._id+'>Salut</span>');

          
        // }
        // if($("a._fc1").length>0){
        //   alert('Existe')
        // }


        // element.find('span.fc-title').html(element.find('span.fc-title').text());
        // element.html(event.title + '<p>Bonjour</p>');:

        // element.html(event.title + '<button type="button" data-planning_id="'+event.planning_id+'" class="btn btn-danger" data-toggle="modal" data-target="#modal-danger">Launch Danger Modal</button>');
        // alert($.contains( document.documentElement,element ))
        // alert($.contains( element, $("a.removeEvent")))


        // if (view.name == 'listDay') {
        //     element.find(".fc-list-item-time").append("<span class='closeon' style='padding-left:5px;padding-right:5px;color:yellow;font-weight:bold'>X</span>");
        // } else {
        //     element.find(".fc-content").prepend("<span class='closeon' style='padding-left:5px;padding-right:5px;color:yellow;font-weight:bold'>X</span>");
        // }

        // element.data('event-id',event.id);
        // element.find("#Delete").on('click',function(){
        //   // alert('Bonj')
        //   if(confirm("Etes vous sûr de vouloir supprimer ce planning ?")){
        //     //Supprimer un planning
        //     supprimerPlanning(event.planning_id)
        //   }
        // })

        element.find(".closeon").on('click', function () {
            // $('#calendar').fullCalendar('removeEvents', event._id);
            //var evento = $("#calendar").fullCalendar('clientEvents')[0];
            // alert(Object.getOwnPropertyNames(evento));
            // alert(evento.nom);

            alert(event.planning_id);
            //Supprimer un planning
            // suppimerPlanning(event.planning_id)
        })
      },
      eventAfterRender: function (event, element, view) {
        //Si ajouter la suppression si elle n'existe pas
        if($("span."+event._id).last().is(":last-child")){
          if ($("span."+event._id).last().find('a.removeEvent').length) {
              // alert('Existe')
          } else {
            $("span."+event._id).last().prepend('<a href="#" class="btn-edit-planning-submit glyphicon glyphicon glyphicon-edit pull-right" style="color:yellow;padding:2px" onClick="showEditForm('+event.planning_id+')" data-planning_id="'+event.planning_id+'" role="button"></a>');

            $("span."+event._id).last().prepend('<a class="removeEvent glyphicon glyphicon-trash pull-right '+event._id+'" style="color:yellow;padding:2px" data-planning_id="'+event.planning_id+'"  data-event_id="'+event._id+'" data-toggle="modal" data-target="#modal-danger"></a>');
              
          }
        }
      },
      eventRenderWait: function (event, element, view) {
        // alert($("a._fc1").length)
      },
      eventAfterAllRender: function (event, element, view) {
        // $('.fc-event-time').each(function(){
        //     $(this).html($(this).text());
        // });
        // alert(Object.getOwnPropertyNames(event))
        // alert(event)
        // element.html(event.title + '<span class="removeEvent glyphicon glyphicon-trash pull-right" id="Delete" style="color:yellow;padding:2px"></span>');
        // alert('Fini')
      },
      drop: function (date, allDay) { // this function is called when something is dropped
        // retrieve the dropped element's stored Event Object
        var originalEventObject = $(this).data('eventObject')

        // we need to copy it, so that multiple events don't have a reference to the same object
        var copiedEventObject = $.extend({}, originalEventObject)

        // assign it the date that was reported
        copiedEventObject.start           = date
        copiedEventObject.allDay          = allDay
        copiedEventObject.backgroundColor = $(this).css('background-color')
        copiedEventObject.borderColor     = $(this).css('border-color')

        // render the event on the calendar
        // the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
        $('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

        // is the "remove after drop" checkbox checked?
        if ($('#drop-remove').is(':checked')) {
          // if so, remove the element from the "Draggable Events" list
          $(this).remove()
        }

      }
    })

    /* ADDING EVENTS */
    var currColor = '#3c8dbc' //Red by default
    //Color chooser button
    var colorChooser = $('#color-chooser-btn')
    $('#color-chooser > li > a').click(function (e) {
      e.preventDefault()
      //Save color
      currColor = $(this).css('color')
      //Add color effect to button
      $('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
    })

    $('#add-new-event').click(function (e) {
      e.preventDefault()
      //Get value and make sure it is not null
      var val = $('#new-event').val()
      if (val.length == 0) {
        return
      }

      //Create events
      var event = $('<div />')
      event.css({
        'background-color': currColor,
        'border-color'    : currColor,
        'color'           : '#fff'
      }).addClass('external-event')
      event.html(val)
      $('#external-events').prepend(event)

      //Add draggable funtionality
      init_events(event)

      //Remove event from text input
      $('#new-event').val('')
    })
  })

  $('#modal-danger').on('show.bs.modal', function(e) {
      // $(this).find('.btn-ok').attr('onClick', $(e.relatedTarget).data('href'));
      $(this).find('.btn-ok').attr('onClick', "supprimerPlanning("+$(e.relatedTarget).data('planning_id')+",'"+$(e.relatedTarget).data('event_id')+"')");
  });

  function supprimerPlanning(planning_id,event_id){
    $('#modal-danger').modal('hide')
    //Supprimer un planning
    $.ajax({
        url: "/planning/provisoires/supprimer/"+planning_id,
        // data: 'id=' + event._id,
        data: {
        "_token": "{{ csrf_token() }}",
        "id":  planning_id
        },
        type: "DELETE",
        success: function (data) {
          // alert(data.calendar_view)
          $('#div_calendar').html(data.calendar_view)
           // $('#calendar').fullCalendar('removeEvents', event_id);
           // alert(data.statut)
        },
        error:function(){
          alert("Echec")
        }
    });
  }
}
initCalendar()
</script>