<?

use Models\CurrencyTable as Currency;

if (!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true) die();

if(!CModule::IncludeModule("lists"))
	return;

/*$strSelectedType = $arCurrentValues["IBLOCK_TYPE_ID"];

$arTypes = array();
$rsTypes = CLists::GetIBlockTypes();
while($ar = $rsTypes->Fetch())
{
	$arTypes[$ar["IBLOCK_TYPE_ID"]] = "[".$ar["IBLOCK_TYPE_ID"]."] ".$ar["NAME"];
	if(!$strSelectedType)
		$strSelectedType = $ar["IBLOCK_TYPE_ID"];
}

$arIBlocks = array();
$rsIBlocks = CIBlock::GetList(Array("sort" => "asc"), Array("TYPE" => $strSelectedType, "ACTIVE"=>"Y"));
while($ar = $rsIBlocks->Fetch())
{
	$arIBlocks[$ar["ID"]] = "[".$ar["ID"]."] ".$ar["NAME"];
}*/

$currencyList = Currency::getList([
	'select' => ['CURRENCY'],
	//'order' => ['ID' => 'ASC'],
]);

$values = [];
while ($item = $currencyList->fetch()) {
	$values[$item['CURRENCY']] = $item['CURRENCY'];
}

$arComponentParameters = array(
	"GROUPS" => array(
	),
	"PARAMETERS" => array(
		"CURRENCY" =>  array(
			//"PARENT" => "LIST",
			"NAME"=>GetMessage("CURRENCY"),
			"TYPE"=>"LIST",
			"VALUES" => $values,
			//"DEFAULT" => "VALUE_1",  // Устанавливаем значение по умолчанию
		),
	),
);

?>
