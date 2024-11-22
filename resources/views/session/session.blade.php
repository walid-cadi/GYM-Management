@extends('layouts.index')

@section('content')
@include('layouts.user-nav')
<style>
        .fc-button {
            background-color: #ff6d2f; /* Dark Green */
            color: white;
            border: none;
            border-radius: 5px;
            padding: 8px 16px;
        }

        .fc-button:hover {
            background-color: #e26d3b; /* Lime Green */
            color: white !important;
        }

        .fc-button:active {
            background-color: #fc4c00; /* Chartreuse */
            color: black; /* For better contrast */
        }

        .fc-button.fc-button-primary {
            background-color: #ff6d2f; /* Dark Green */
            color: white;
        }

        .fc-daygrid-day.fc-day-selected,
        .fc-timegrid-day.fc-day-selected {
            background-color: #e26d3b; /* Lime Green */
            color: white;
        }

        .fc-daygrid-day.fc-day-today {
            background-color: #fc4c00; /* Chartreuse */
            color: black; /* For contrast */
        }

        .fc-daygrid-day.fc-day-active {
            background-color: #ff6d2f; /* Dark Green */
            color: white;
        }
</style>
<div class="mt-[7vh] bg-[#111317]">
    <div class="py-12">
        <h1 class="text-center text-white text-4xl font-semibold p-5">Sessions</h1>
        @if (!auth()->user()->hasRole(["trainer","admin"]) )
            @if ($request_isPay && $request_isPay->pay == 0)
                <div class="w-full flex justify-end py-2 px-[2vw]">
                    <div class="text-center w-1/6 py-3">
                        <a href="trainer/subscrip" type="submit" class="w-full py-3 px-6 bg-[#ff6d2f] text-white rounded-md shadow-lg hover:bg-[#ff6d2fdd] focus:outline-none focus:ring-2 focus:ring-blue-400">
                            Go To Pay
                        </a>
                    </div>
                </div>
            @elseif ($request_isPay && $request_isPay->pay == 1)
                <div class="w-full flex justify-end py-2 px-[2vw]">
                    <div class="text-center w-1/6 py-3">
                        <h1 type="submit" class="w-full py-3 px-6 bg-[#ff6d2f] text-white rounded-md shadow-lg hover:bg-[#ff6d2fdd] focus:outline-none focus:ring-2 focus:ring-blue-400">
                           Pending
                        </h1>
                    </div>
                </div>
            @else
                <div class="w-full flex justify-end py-2 px-[5vw]">
                        <form class="w-1/4" action="{{ route("trainer-requests.store") }}" method="POST">
                            @csrf
                            <div class="text-center">
                                <button type="submit" class="w-full py-3 px-6 bg-[#ff6d2f] text-white rounded-md shadow-lg hover:bg-[#ff6d2fdd] focus:outline-none focus:ring-2 focus:ring-blue-400">
                                    Request To Be Trainer
                                </button>
                            </div>
                        </form>
                </div>
            @endif
        @elseif (auth()->user()->hasRole(["trainer"]))
            <div class="w-full flex justify-end py-2 px-[2vw]">
                    <div class="text-center w-1/6 py-3">
                        <h1 type="submit" class="w-full text-white text-xl font-semibold ">
                           Trainer
                        </h1>
                    </div>
                </div>
        @endif
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <button class="hidden bg-[#ff6d2f] text-white rounded-md px-4 py-2 hover:bg-[#ff6d2fc8] transition" id="session" onclick="openModal('sessionModal')">
                Click to Open modal
            </button>
            <div id="sessionModal" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                <div class="relative top-20 mx-auto shadow-2xl rounded-lg bg-white max-w-lg">
                    <div class="flex justify-end p-4">
                        <button onclick="closeModal('sessionModal')"
                                type="button"
                                class="text-gray-500 hover:bg-gray-100 hover:text-gray-900 rounded-full p-2 transition">
                            <svg class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </button>
                    </div>

                    <div class="px-6 pb-8">
                        <form method="post" action="{{ route('session.store') }}" class="flex flex-col gap-6">
                            @csrf
                            <h1 class="text-xl font-bold text-gray-800 text-center">Create Session</h1>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="name">Name</label>
                                <input class="w-full mt-1 rounded-lg border-gray-300 focus:border-[#ff6d2f] focus:ring-[#ff6d2f] p-3"
                                    name="name" id="name" type="text" placeholder="Enter session name" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="description">Description</label>
                                <textarea class="w-full mt-1 rounded-lg border-gray-300 focus:border-[#ff6d2f] focus:ring-[#ff6d2f] p-3 resize-none"
                                        name="description" id="description" rows="3" placeholder="Enter session description" required></textarea>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="spots">Spots</label>
                                <input class="w-full mt-1 rounded-lg border-gray-300 focus:border-[#ff6d2f] focus:ring-[#ff6d2f] p-3"
                                    name="spots" id="spots" type="number" min="1" placeholder="Enter number of spots" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="start">Start</label>
                                <input class="w-full mt-1 rounded-lg border-gray-300 focus:border-[#ff6d2f] focus:ring-[#ff6d2f] p-3"
                                    name="start" id="start" type="datetime-local" required>
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-gray-700" for="end">End</label>
                                <input class="w-full mt-1 rounded-lg border-gray-300 focus:border-[#ff6d2f] focus:ring-[#ff6d2f] p-3"
                                    name="end" id="end" type="datetime-local" required>
                            </div>

                            <button class="w-full py-3 px-6 bg-[#ff6d2f] text-white font-semibold rounded-lg shadow-md hover:bg-[#ff6d2fd8] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-600 transition">
                                Create
                            </button>
                        </form>
                    </div>
                </div>
            </div>

            @foreach ($sessions as $session)
                <button class="hidden bg-[#ff6d2f] text-white rounded-md px-4 py-2 hover:bg-[#ff6d2fc8] transition" id="session{{ $session->id }}" onclick="openModal('sessionInfo{{ $session->id }}')">
                    Click to Open modal
                </button>

                <div id="sessionInfo{{ $session->id }}" class="fixed hidden z-50 inset-0 bg-gray-900 bg-opacity-60 overflow-y-auto h-full w-full px-4 ">
                    <div class="relative top-40 mx-auto shadow-xl rounded-md bg-white min-h-[50vh] w-[45vw]">
                        <div class="flex justify-end p-2">
                            <button onclick="closeModal('sessionInfo{{ $session->id }}')" type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center">
                                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                    <path fill-rule="evenodd"
                                        d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                        clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <div class="pb-6 pt-0 ">
                            <div class="px-6 pb-6 flex flex-col gap-y-6">
                                <h1 class="text-2xl text-center font-bold text-gray-800 ">{{ $session->name }}</h1>
                                <h1 class="text-2xl text-center font-bold text-gray-800 ">Owner: {{ $session->trainer->name }}</h1>
                                <div class="flex items-center justify-between">
                                    <p class="text-gray-600 ">
                                    <span class="font-medium text-gray-700">Start:</span> {{ \Carbon\Carbon::parse($session->start)->format('F j, Y g:i A') }}
                                </p>
                                <p class="text-gray-600">
                                    <span class="font-medium text-gray-700">End:</span> {{ \Carbon\Carbon::parse($session->end)->format('F j, Y g:i A') }}
                                </p>
                                </div>
                                <p class="text-gray-600 ">
                                    <span class="font-medium text-gray-700">Description:</span> {{ $session->description }}
                                </p>
                                <div class="flex items-center justify-between">
                                    <p class="text-gray-600">
                                        <span class="font-medium text-gray-700">Spots:</span> {{$session->spots}}
                                    </p>
                                    @if(Auth::user()->sessions->contains($session->id))
                                        <p>Vous êtes déjà inscrit à cette session.</p>
                                    @else
                                        <form method="post" action="{{ route('sessions.join', $session->id) }}">
                                            @csrf
                                            <button type="submit" class="">Rejoindre cette session</button>
                                        </form>
                                    @endif
                                </div>
                                <div>
                                    @if (auth()->user()->id == $session->user_id)
                                        <form method="post" action="{{ route("session.delete",$session->id) }}">
                                            @csrf
                                            @method("DELETE")
                                            <button>Delete This Session</button>
                                        </form>
                                    @endif
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
            <script type="text/javascript">
                window.openModal = function(modalId) {
                    document.getElementById(modalId).style.display = 'block'
                    document.getElementsByTagName('body')[0].classList.add('overflow-y-hidden')
                }

                window.closeModal = function(modalId) {
                    document.getElementById(modalId).style.display = 'none'
                    document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                }

                // Close all modals when press ESC
                document.onkeydown = function(event) {
                    event = event || window.event;
                    if (event.keyCode === 27) {
                        document.getElementsByTagName('body')[0].classList.remove('overflow-y-hidden')
                        let modals = document.getElementsByClassName('modal');
                        Array.prototype.slice.call(modals).forEach(i => {
                            i.style.display = 'none'
                        })
                    }
                };
            </script>
            {{-- <div class="">
                <form class="hidden" id="updateForm" method="post" action="">
                    @csrf @method('PUT')
                    <input id="updatedStart" name="start" type="hidden">
                    <input id="updatedEnd" name="end" type="hidden">
                    <button id="submitUpdate"></button>
                </form>
            </div> --}}
            {{-- @include('components.delete_event') --}}
            <div class="w-full h-[90vh] bg-white rounded-3xl border-none p-3" id="calendar"></div>
                <script>
                    document.addEventListener('DOMContentLoaded', async function() {
                        let response = await axios.get("/sessions/create")
                        let events = response.data.sessions

                        let nowDate = new Date()
                        let day = nowDate.getDate()
                        let month = nowDate.getMonth() + 1
                        let hours = nowDate.getHours()
                        let minutes = nowDate.getMinutes()
                        let minTimeAllowed =
                            `${nowDate.getFullYear()}-${month < 10 ? "0"+month : month}-${day < 10 ? "0"+day : day}T${hours < 10 ? "0"+hours : hours}:${minutes < 10 ? "0"+minutes : minutes}:00`
                        start.min = minTimeAllowed;


                        var myCalendar = document.getElementById('calendar');

                        var calendar = new FullCalendar.Calendar(myCalendar, {

                            headerToolbar: {
                                left: 'prev,next,dayGridMonth,timeGridWeek,timeGridDay',
                                center: 'title',
                                right: 'listMonth,listWeek,listDay'
                            },
                            views: {
                                listDay: { // Customize the name for listDay
                                    buttonText: 'Day Events',

                                },
                                listWeek: { // Customize the name for listWeek
                                    buttonText: 'Week Events'
                                },
                                listMonth: { // Customize the name for listMonth
                                    buttonText: 'Month Events'
                                },
                                timeGridWeek: {
                                    buttonText: 'Week', // Customize the button text
                                },
                                timeGridDay: {
                                    buttonText: "Day",
                                },
                                dayGridMonth: {
                                    buttonText: "Month",
                                },

                            },


                            initialView: "timeGridWeek", // initial view  =   l view li kayban  mni kan7ol l  calendar
                            slotMinTime: "09:00:00", // min  time  appear in the calendar
                            slotMaxTime: "19:00:00", // max  time  appear in the calendar
                            nowIndicator: true, //  indicator  li kaybyen  l wa9t daba   fin  fl calendar
                            selectable: true, //   kankhali l user  i9ad  i selectioner  wast l calendar
                            selectMirror: true, //  overlay   that show  the selected area  ( details  ... )
                            selectOverlap: false, //  nkhali ktar mn event f  nfs  l wa9t  = e.g:   5 nas i reserviw nfs lblasa  f nfs l wa9t
                            weekends: true, // n7ayed  l weekends    ola nkhalihom
                            editable: false,
                            droppable: true,


                            // events  hya  property dyal full calendar
                            //  kat9bel array dyal objects  khass  i kono jayin 3la chkl  object fih  start  o end  7it hya li kayfahloha
                            events: events,

                            eventDrop: (info) => {
                                updateEvent(info)

                            },
                            eventResize: (info) => {

                                updateEvent(info)
                            },

                            eventClick: (info) => {

                                let eventId = info.event._def.publicId

                                let buttonId = `session${eventId}`;

                                let button = document.getElementById(buttonId);

                                button.click()

                                // if (validateOwner(info)) {
                                //     deleteEventForm.action = `/sessions/delete/${eventId}`
                                //     deleteEventBtn.click()
                                // }

                            },

                            selectAllow: (info) => {

                                return info.start >= nowDate;
                            },
                            @role(["trainer"])
                            select: (info) => {
                                //console.log(info);
                                if (info.end.getDate() - info.start.getDate() > 0 && !info.allDay) {
                                    return
                                }

                                if (info.allDay) {
                                    start.value = info.startStr + " 09:00:00"
                                    end.value = info.startStr + " 19:00:00"

                                } else {
                                    start.value = info.startStr.slice(0, info.startStr.length - 6)
                                    end.value = info.endStr.slice(0, info.endStr.length - 6)
                                }

                                //submitEvent.click()
                                session.click()
                            },
                            @endRole

                        });

                        calendar.render();

                        function updateEvent(info) {

                            let eventInfo = info.event._def
                            let eventTime = info.event._instance.range

                            if (eventTime.start > nowDate && validateOwner(info)) {
                                function formattedDate(time) {
                                    let date = new Date(time);
                                    return date.toISOString().slice(0, 19);
                                }

                                updatedStart.value = formattedDate(eventTime.start)
                                updatedEnd.value = formattedDate(eventTime.end)



                                updateForm.action = `/sessions/update/${eventInfo.publicId}`

                                submitUpdate.click()

                            } else {
                                window.location.reload()
                            }
                        };

                        function validateOwner(info) {
                            let owner = info.event._def.extendedProps.owner
                            let authUser = `{{ Auth::user()->id }}`

                            return owner == authUser
                        }


                    })
                </script>
            </div>
    </div>
</div>
@endsection


{{--  --}}

