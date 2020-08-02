<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Estructuras de control con Blade</title>
</head>
<body>
   Su nota es: {{$nota}}
   <br>
   @if ($nota>13)
    Aprobado
@else
   Desaprobado
@endif

<br>
<br>
<h3>Estructura IF</h3>
Su segunda nota es: {{$nota}}
<br>
@if ($nota>=0 & $nota<=6)
 Pésimo
 @elseif ($nota>=7 & $nota<=12)
 Bajo
@elseif ($nota>=13 & $nota<=16)
Regular
@elseif ($nota>=17 & $nota<=20)
Excelente
@else
   Nota invalida fuera de rango
@endif
<br>
<br>
<br>
<br>
<h3>Estructura Switch</h3>
<br>
<br>
   @switch ($numero)
      @case (1)
           Domingo
           @break
      @case (2)
           Lunes
           @break
      @case (3)
          Martes
          @break
      @case (4)
          Miercoles
          @break
      @case (5)
          Jueves
          @break
      @case (6)
           Viernes
           @break
      @case (7)
          Sabado
          @break
      @endswitch

      <br>
      <br>
      <br>
      <br>
      <h3>Estructura while</h3>
      <br>
      <br>
      @while ($numero>0)
      <p>{{$numero=$numero-1}}</p>
       @endwhile

       <h3>Estructura while</h3>
       <br>
       <br>
       @foreach ($lista as $objeto)
       <p>{{$objeto}}</p>
        @endforeach

        <h3>Directiva php</h3>
        <br>
         <br>
        @php
          echo "hola mundo!";
          $soy = "programador";
        @endphp
         <p>{{$soy}} porque uso blade</p>
        <br>
        <br>


        <h4>La suma es: </h4>
        @php
        function sumar($num1, $num2){
          return $num1 + $num2;
        }
        @endphp
        <h5>{{sumar(15,8)}}</h5>

</body>
</html>
