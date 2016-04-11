<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>Reporte</title>
<style type="text/css">
  .clearfix:after {
  content: "";
  display: table;
  clear: both;
}

a {
  color: #5D6975;
  text-decoration: underline;
}

body {
  position: relative;
  width: 28cm;  
  height: 29.7cm; 
  margin: 0 auto; 
  color: #001028;
  background: #FFFFFF; 
  font-family: Arial, sans-serif; 
  font-size: 12px; 
  font-family: Arial;
}

header {
  padding: 10px 0;
  margin-bottom: 30px;
}

#logo {
  text-align: center;
  margin-bottom: 10px;
}

#logo img {
  width: 90px;
}

h1 {
  border-top: 1px solid  #5D6975;
  border-bottom: 1px solid  #5D6975;
  color: #5D6975;
  font-size: 2.4em;
  line-height: 1.4em;
  font-weight: normal;
  text-align: center;
  margin: 0 0 20px 0;
  background: url(dimension.png);
}

#project {
  float: left;
}

#project span {
  color: #5D6975;
  text-align: right;
  width: 52px;
  margin-right: 10px;
  display: inline-block;
  font-size: 0.8em;
}

#company {
  float: right;
  text-align: right;
}

#project div,
#company div {
  white-space: nowrap;        
}

table {
  width: 100%;
  border-collapse: collapse;
  border-spacing: 0;
  margin-bottom: 20px;
}

table tr:nth-child(2n-1) td {
  background: #F5F5F5;
}

table th,
table td {
  text-align: center;
}

table th {
  padding: 5px 20px;
  color: #5D6975;
  border-bottom: 1px solid #C1CED9;
  white-space: nowrap;        
  font-weight: normal;
}

table .service,
table .desc {
  text-align: left;
}

table td {
  padding: 20px;
  text-align: right;
}

table td.service,
table td.desc {
  vertical-align: top;
}

table td.unit,
table td.qty,
table td.total {
  font-size: 1.2em;
}

table td.grand {
  border-top: 1px solid #5D6975;;
}

#notices .notice {
  color: #5D6975;
  font-size: 1.2em;
}

footer {
  color: #5D6975;
  width: 100%;
  height: 30px;
  position: absolute;
  bottom: 0;
  border-top: 1px solid #C1CED9;
  padding: 8px 0;
  text-align: center;
}

</style>

  </head>
  <body>

    <main>
      <div id="details" class="clearfix">
        <div id="invoice">
          <h1>Reporte de citas</h1>
        </div>
      </div>
      <table border="0" cellspacing="0" cellpadding="0">
        <thead>
          <tr>
            <th class="no">Fecha de cita</th>
            <th class="desc">Hora de cita</th>
            <th class="unit">Nombre paciente</th>
            <th>Nombre medico</th>
            <th>Consultorio</th>
            <th>Estado de cita</th>
            <th>Observaciones</th>
          </tr>
        </thead>
        <tbody>
        
          
           @foreach ($data['citas'] as $cita)
                  <tr> 
                    <td>{{$cita->citFecha}}</td>
                    <td>{{$cita->citHora}}</td> 
                    {!!
                      $pacientirijillos = '';
                      for ($i = 0; $i <= count($cita->pacientes)-1; $i++)
                      {
                        $paciente = $cita->pacientes[$i];
                        if (count($cita->pacientes)-1==0)
                        {
                          $pacientirijillos .= $paciente->pacNombre;
                        }
                        elseif ($i == count($cita->pacientes)-1)
                        {
                          $pacientirijillos .= $paciente->pacNombre;
                        }
                        else
                        {
                          $pacientirijillos .= $paciente->pacNombre.',';
                        }
                      }
                    !!}
                    <td>{{$pacientirijillos}}</td> 
                    {!!
                      $doctorcirijillos = '';
                      for ($i = 0; $i <= count($cita->medicos)-1; $i++)
                      {
                        $medico = $cita->medicos[$i];
                        if (count($cita->medicos)-1==0)
                        {
                          $doctorcirijillos .= $medico->medNombre;
                        }
                        elseif ($i == count($cita->medicos)-1)
                        {
                          $doctorcirijillos .= $medico->medNombre;
                        }
                        else
                        {
                        $doctorcirijillos .= $medico->medNombre.',';
                        }
                      }
                    !!}
                    <td>{{$doctorcirijillos}}</td> 
                    {!!
                      $consultorijillos = '';
                      for ($i = 0; $i <= count($cita->consultorios)-1; $i++)
                      {
                        $consultorio = $cita->consultorios[$i];
                        if (count($cita->consultorios)-1==0)
                        {
                          $consultorijillos .= $consultorio->conNombre;
                        }
                        elseif ($i == count($cita->consultorios)-1)
                        {
                          $consultorijillos .= $consultorio->conNombre;
                        }
                        else
                        {
                          $consultorijillos .= $consultorio->conNombre.',';
                        }
                      }
                    !!} 
                    <td>{{$consultorijillos}}</td>               
                    <td>{{$cita->citEstado}}</td>
                    <td>{{$cita->citObservaciones}}</td>   
                  </tr> 
                @endforeach
      </table>
  </body>
</html>