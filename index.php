<?php require("validaregistro.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dados de Pokemons</title>
</head>
<body>
<form action="index.php" method="post">
    <input type="number" name="id" id="">
    <button type="submit"></button>
</form>
<h1>Dados de um pokemon</h1>
<?php
@$id = $_POST['id'];
if($id == null){
    $id = 1;
} else{
    $id = $id;
}
$p = file_get_contents("https://www.canalti.com.br/api/pokemons.json");
$p = json_decode($p);
//id do pokemon (pode ser nome, etc.)

foreach($p->pokemon as $item){
if($item->id == $id){
echo "<p>ID: $item->id <br/>";
echo "Nome: " . $item->name . "<br/>" ;
echo "Imagem: " . (isset($item->img)? $item->img : NULL) . "<br/>" ;
echo "Tipo: ";
if(isset($item->type)){
foreach($item->type as $tipo){
echo "<br/>-" . $tipo . ", ";
}
}
echo "<br/>";
echo "Altura: " . (isset($item->height)?$item->height : NULL) . "<br/>";
echo "Peso: " . (isset($item->weight)?$item->weight : NULL) . "<br/>" ;
echo "Doce: " . (isset($item->candy)?$item->candy : NULL) . "<br/>" ;
echo "Total de Doces: " . (isset($item->candy_count)?$item->candy_count : NULL) . "<br/>" ;
echo "Ovos: " . (isset($item->egg)?$item->egg : NULL) . "<br/>" ;
echo "Spawn Chance: " . (isset($item->spawn_chance)?$item->spawn_chance : NULL) . "<br/>" ;
echo "AVG Spawns: " . (isset($item->avg_spawns)?$item->avg_spawns : NULL) . "<br/>" ;
echo "Spawn time: " . (isset($item->spawn_time)?$item->spawn_time : NULL) . "<br/>" ;
echo "Multiplicadores: ";
if(isset($item->multipliers)){
foreach($item->multipliers as $mult){
echo "<br/>-" . $mult . ", ";
}
}
echo "<br/>";
echo "Fraqueza: ";
if(isset($item->weakness)){
foreach($item->weakness as $f){
echo "<br/>-" . $f . ", ";
}
}
echo "<br/>";
echo "Próxima Evolução: ";
if(isset($item->next_evolution)){
foreach($item->next_evolution as $e){
echo "<br/>-Número: " . $e->num . ", Nome: " . $e->name;
}
}
echo "<br/>";
break;
}
}
?>
<a href="sair.php">Logout</a>
</body>
</html>