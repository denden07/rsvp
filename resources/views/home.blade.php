@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">{{ __('Attendance') }}</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table id="myTable" class="display">
                        <thead>
                            <tr>
                                <th>Full name</th>
                                <th>Contact #</th>
                                <th>Attending</th>
                                <th>Plus one</th>
                                <th>Message</th>
                                <th>Date Submitted</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($rsvp as $data)
                            <tr>
                                <td>{{ $data -> full_name}}</td>
                                <td>{{ $data -> phone}}</td>

                                <td>
                                    @if($data -> attendance == 1)
                                    Yes
                                    @else
                                    No
                                    @endif
                                </td>
                                <td>
                                    @if($data -> plus_one == 1)
                                    Yes
                                    @else
                                    No
                                    @endif
                                </td>
                                <td class="message-btn" data-id="{{ $data->id }}" style="cursor:pointer">View message</td>
                                <td >{{ $data -> created_at  }}</td>
                                <td  class="delete-btn" data-id="{{ $data->id }}" style="color:red;cursor:pointer">Delete</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready( function () {
    $('#myTable').DataTable();
} );




let delete_btn = document.querySelectorAll('.delete-btn')

delete_btn.forEach(e => {
    e.addEventListener('click', event => {
       var data_id =event.target.getAttribute('data-id')

       Swal.fire({
  title: "Do you want to delete the data?",
  showDenyButton: true,
  confirmButtonText: "Yes",
  denyButtonText: `Cancel`
}).then((result) => {
  /* Read more about isConfirmed, isDenied below */
  if (result.isConfirmed) {
    let timerInterval;
Swal.fire({
  title: "Auto close alert!",
  html: "I will close in <b></b> milliseconds.",
  timer: 2000,
  timerProgressBar: true,
  allowOutsideClick: false,
  didOpen: () => {
    Swal.showLoading();
    const timer = Swal.getPopup().querySelector("b");
    timerInterval = setInterval(() => {
      timer.textContent = `${Swal.getTimerLeft()}`;
    }, 100);
  },
  willClose: () => {
    clearInterval(timerInterval);
  }
}).then((result) => {
  /* Read more about handling dismissals below */
  if (result.dismiss === Swal.DismissReason.timer) {
    console.log("I was closed by the timer");
  }
});
    setTimeout( () => {
            // Get form data

            // Send form data to the API route
            fetch(`/api/rsvp/${data_id}`, {
                method: 'DELETE'
            })
            .then(response => {
                Swal.fire("Deleted!", "", "success");
                location.reload();
            })
            .catch(error => {

            });
        }, 2000)


  } else if (result.isDenied) {
    Swal.fire("Data not deleted", "", "info");
  }
});

    })
})

</script>

<script>
    let message_btn = document.querySelectorAll('.message-btn')
    message_btn.forEach(e => {
        e.addEventListener('click',event => {

            var data_id =event.target.getAttribute('data-id')

            fetch(`/api/rsvp/message/${data_id}`, {
                method: 'GET'
            })
            .then(response => {
                if (response.ok) {
                    // Parse response body as JSON
                    return response.json();
                } else {
                    // If response is not OK, parse error response body as JSON
                    return response.json().then(data => {
                        throw new Error(data.error);
                    });
                }
            })
            .then(response => {
                let message = response.message
                setTimeout(()=>{
                    Swal.fire({
                        title: "Message",
                        text: message,
                    });
                },200)


            })
            .catch(error => {

            });



        })
    })
</script>
@endsection
