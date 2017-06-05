<h1>Nazwa projektu: {{$project->name}}</h1>
<h2>Opis: {{$project->description}}</h2>
<h3>Manager: {{$project->manager->name}} {{$project->manager->surname}}</h3>
<h3>Liczba zadań: {{$project->tasks->count()}}</h3>
@if($project->tasks->count())
<ul>
    <?php $sum = 0; ?>
    @foreach($project->tasks as $task)
    <li>{{$task->name}} <br>
    <ul>
        @foreach($task->acceptedComments as $comment)
        <li>{{$comment->user->name}} {{$comment->user->surname}} {{$comment->time}} godzin</li>
        @endforeach
    </ul>
    Czas: {{$task->acceptedComments->sum('time')}}godzin</li>
    <?php $sum += $task->acceptedComments->sum('time'); ?>
    @endforeach
</ul>
<h2>Łącznie godzin: {{$sum}} </h2>
@endif