<x-app-layout>
    <x-slot name="header">Quizler</x-slot>
    <div class="card">
        <div class="card-body">
            <h5 class="card-title">
                <a href="{{route('quizzes.create')}}" class="btn btn-sm btn-primary"><i class="bi bi-plus-lg"></i> Quiz oluştur</a>
            </h5>
            <table class="table table-bordered">
                <thead>
                  <tr>
                    <th scope="col">Quiz</th>
                    <th scope="col">Durum</th>
                    <th scope="col">Bitiş Tarihi</th>
                    <th scope="col">İşlemler</th>
                  </tr>
                </thead>
                <tbody>
                @foreach ($quizzes as $quiz) 
                  <tr>
                    <td>{{$quiz->title}}</td>
                    <td>{{$quiz->status}}</td>
                    <td>{{$quiz->finished_at}}</td>
                    <td>
                        <a href="#" class="btn btn-sm btn-primary"><i class="fa fa-pen"></i></a>
                        <a href="#" class="btn btn-sm btn-danger"><i class="fa fa-times"></i></a>
                    </td>
                  </tr>
                @endforeach  
                </tbody>
            </table>
            {{$quizzes->links()}}
        </div>
    </div>
  <x-slot name="css">
    @toastr_css
  </x-slot>
  <x-slot name="js">
    @toastr_js
    @toastr_render
</x-slot>
</x-app-layout>
