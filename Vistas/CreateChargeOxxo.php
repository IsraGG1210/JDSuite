<?php
require '../vendor/autoload.php';
require 'Conexion/funciones.php';

$subtotal = $_REQUEST['subtotal'];
$envio = $_REQUEST['envio'];
$total = $_REQUEST['total'];

\Stripe\Stripe::setApiKey("sk_test_51MmJTOGuTfIl032Majf4NM807znGxSAzFysiDxy7ke9HDgtha6enG8jYzQU4lobgTE3x4OpWkXBWsEmqT0YZSk2m007pZd6sF2");

$currency = 'mxn'; // La moneda del pago
$description = 'Pago en OXXO'; // Una descripción del pago

$payment_intent = \Stripe\PaymentIntent::create([
    'amount' => ($total*100),
    'currency' => $currency,
    'description' => $description,
]);
//echo "<pre>", print_r($payment_intent), "</pre>";

$barcode = new Picqer\Barcode\BarcodeGeneratorHTML(); // Crea un objeto para generar códigos de barras
$reference = $payment_intent['id']; // El ID de la transacción de pago

$html = $barcode->getBarcode( // Genera el código de barras
    $reference,
    $barcode::TYPE_CODE_128,
    2,
    60
);
?>
<!DOCTYPE html>
<html>
<head>
	<title>Hoja de Pago OXXO</title>
	<style>
		body {
			font-family: Arial, sans-serif;
		}
		.container {
			margin: auto;
			max-width: 500px;
			padding: 20px;
			background-color: #f7f7f7;
			border: 1px solid #ccc;
			box-shadow: 0 0 5px rgba(0,0,0,0.1);
		}
		.header {
			text-align: center;
			margin-bottom: 30px;
		}
		.logo {
			max-width: 150px;
		}
		.row {
			margin-bottom: 10px;
		}
		.label {
			display: inline-block;
			width: 100px;
			font-weight: bold;
		}
		.value {
			display: inline-block;
		}
		.barcode {
			text-align: center;
			margin-top: 30px;
		}
		.barcode img {
			max-width: 100%;
			height: auto;
		}
	</style>
</head>
<body>
	<div class="container-fluid">
		<div class="lip row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="header">
                <img class="logo" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAASwAAACoCAMAAABt9SM9AAAAtFBMVEX////iHCrwqSngAADwqCXxrj/ytFXxsUbwpQ7hCx/th4rreX7iGCf97+/jKTThABXhABrhABPiEiPgAAjgAA341tf+9/f30NH0ubv++vrlREzvoQDztLb86+vvmZzuk5bpaG363t/oYWfyra/lP0fmTFP++fLsgYXqcXbnVFv2ycr0uLr40tPwoaPjKDPmUFfkND7pbHL98uT31KPzu2T2zpX0w3v76dH54L7ujpH0v271yIZUKORMAAAPXElEQVR4nO1da2PauBKFKm1jELEtGwIJIQSShdCSkG73wb3//3/d8LQ0cyRLtN1me3U+BtuSjkbz0khpNCIiIiIiIiIiIiIiIiIiIiIiIiIiIiJOxW+/f/0YccCHP744uPrz+vwsosL59YffbGL17vxdhImz678wWe/OfnbX3iKu4VL8M8oVwtl7wNWX65/drTeK8785Wb9HwcI4+8rJ+ho1lgXnnKz3kSwLrrn7EMmyIZIVAEhWBAYg6+P7CIx3nKwB1/kRO/Q8/hKxRyQrAJGsAESyAhCpCQAnq/VrYL5wjvvm86fl7Trsk7MO+0wzS/79KJLPdqIW6+dClHmaBY5UcLIuZPNfj3JiZao/EWWmTvrqr0mWuLUtvlZRnkbU9rO/IlliaKHqRWTf9N1fkCxhUe0zkXzjh08nSyVZmr8izRJV/0pSClFkYfOg0rJMg1eNhat+xqRKH4HXl08jK8lFcTVfL4f9/nA6mk1kjdKU4mXR6d0tVcAykOJhenk5nIgwhkUfUTUgn5FZKbLH9mi6HcFt+yEXeVLX0ClkJUU6H96ZL/UWt/fCKgUy6e6faxe+g1bJXkK6zRDhwvqqm+grUGbiYr0gI7/pz5rCLfrBZMm8nFlcmM70HmsFmVetjITfoFXz6C4Pnvxlqxihni11sVLiaXSDR3B3q1zGMpAsWawslmbfWhvRVeorY5b7DFoW2njuPAluNtM26tVce1+JyaVrBIsHYaUriCxZrtwxxCs6bdaYvDCemPjoLWGMqO1pxpJn1KWHtOqKmNyhR3R0H2xaMoSspJzWNbTBzSNpLCMu4lX90IXZ0qL04ko9ge70VlVz+aoLnmBYNPF8BpAlxr4J57658PNP5s+DpzqNTVdTx28dCqCKOpV5kGLpOYBGCwqXN1kKm2SM3oOumHL6Zid1a+zkgbww8CILOVgddeQqu6hdgRU+J0D8fclKLiwGxIK1NryMTahbY8smFeEbH7KQIdS4KsdBAxhomi6QrAxqThc+VeNTj+zXhWv0fDX1PSxoNuad6MkjV9bY2oo5cwn9yErtGQ8rLis+gC6Z2tkCq+mx3i1VK94FTTkKL9tkYk376EVWOg5v6XXZH9tKwPu3Nle+4Fq4u/2SVA7KZMkH0qjsoC0P4cYtYcuHrIwvIy9Uaw0Q0JhznbBtbM6eHDQ3PZLNxqPd5xDAJ3iouPI2gyZa5vL3IAsJuB+qtYYMFRy6uuIP7ga9WctWnwOtsvFxNvLWqSMwHeh6smRu2QBajMarVIii+TwbWkzl7NhfNPMrPnSZ8Mba6ZHuToF9jhKw0To6sollZXT6rcenUojyYrJeWAZp9LGeLAFDqcV4k5TZPilVkouLEdAZjcb9oS0j1tujx9NggrtCO/Esd8bsM7QLyBBWUi0T5EwPplciP44gK8XjJ/CU6bTUkpUiER42CyIVMhNtQFflekvJ5+6G+slgte6ManYwx8iKJve8Yc03QbM9WLN8kipTpNmGmiGqI0uCcKu7KqHfilyZ6XExKDCkrjn0kn9gt/BUFYrzpAX3YQ2vN5uBXhUo+JNpAqIUzW2pIwtMC46bNkhBQHFfhRtAdfR1ttBq2qp0WWi9pHYBLXAtnpIZ+7X3YHNbpOBd0OLSGrIU80YHVw5vGgSQmvDkINm01Bx9YHV3zJgzdmGuH2Q6tEdK5mF1XWn9rMmovz1KYQ1ZzPfuPbnzK9yGT6quoehtdlinMgOVBNuJIV5Sx1ACAujl56qPks3Awp3TVwVbHfnhBTdZCfUQe7X5cMaWHjSjkR1cGWAIhzvlTjuha7oC6End3S2pqF/WxeSSdWR0EC03Wey9+/ogjVk0PbBDlmmXCwQ87mhWNF9zIHGDlPv7jZGmkaSE33SzRX29Y4LISRbr59wrI0w+qac5JYipt+FuuWZ/7+22WrjarBxOlvhqUJtBvYGmx94HiyJmiQdZNMXZr58W1Ja+H4c0UyeXGWDk4DyjTYjd2lUX/BfTGxGkNa/ZbpZEtx7E0UmWIL94bijTVP1a7yGyeXcC/HFcGSHgLG6Y1HfYDrgxtD+VylqFdWiRyP+eEhdZamz+cOu5nSxz872u4dagHZgFX5y32uIFjv2rNCKTMDANUE78BhCNQlCS9yN3kUWa8kuEb0DjBtMzS184WwxmKhXQ0hUok0E2jsjoFt7b4aTB/XS7yCLCuMQJKADqNb+YEwqUOQUxWlJxTTcFTtvYlH3qZD141wEkRE+KOrJkgv/ugdKc9CmhuTbHO6D5CBRYcqzJ9mJihoVe2x6HLprx5s79cZBFVJb/HjpzZj/TPVJbBdUBV0wEUNxIwTISqalHlgElPMSZ3SktB1lkIzmkqWZqvNpjPAMlpAFlnEFGgoDvGBVm2Oi/Ctk63G0vOcgiXtYkoClKBuMZWf0jllCG6zZ5geQTLytgaWwy/jp2Gt5BVmlWFtWWeukgm9B8Waknay2AzRlyS2MP9K8w2fS2hdvWDKJ3eRoHWWb4zZeSC5lpqoBUJmBnYgurGpapQxphQt+UDp+d2gpkCdeRZf4UYkqYHUIlQyjC2cBeNeLaZkJbRcSEUpvsBjHoWxPlIssQxDAhJuZwhpJgOcj3WjbIDl+1bmC2kdQoM1YYBZV1E429XeTeZHXDyDK9dEgWjPkc2/pN+wbgCHbu28gy3Q4VRNb3lyyssd11gdidtWRDSIYpyPehJmqXc3OQZUQ7gTrLFIE5IsvimbrrAtFLNvMpv6POqnMdSDI6iCwSSiMfDdcV19QFyhJIoy3NJpXxmGet5R6m2A/qrCHhNuiUCnl3xd/NrLkHV10g2sqxebE0Hxe2NtC7DrJSUz/ApWRtyvws13euyNgehdq8+DZeYSRtEuJnkf5d1rkOmal3hgFtkWJuPqeoAKSCrS7QtnL16iIdRL7HAQFbZqaRdvrOlXUwLa9nxTBqimsLd+iibd/oQFs5ewzgFh3RnCHTXZjbUK06a0hCq8az/8QQLpiHU1v5jOoC8YmAPW5QMRLx9vxTvdQ2NO63X3eSZWrTvrc1oQqJ0lyfbgFZGrSVowH5DzR96XtQg8W2g9pMKdt089lz26IwBYfOqC0qNPBIpFFmrjC6gX1/IuH++UuS3NnrEefuDkkM9D2deBrwEpWF4mFQOUjSCDVargFPUBEBabx4ilZKRH8vku59QzIGnpaCoM6Q2UWZckM4opuhDVoXWJeI3oDH4HTHwtNI0eV7cDqcZNGJ8XPrUpJNIKsQiMhCIIWk62y/cuMLNpm0sanX4qAzc1gaTrJI9qwuJ7ADW2VmTAYq0jdzgKoWqp14lM154R/qsIrEhL7oc36P5TYOpS3uKpqSCv+s1iLy7LpxDhXUFe/K3NH2zSHoQxZhJODOK+2OoNnr+k1pVqF4tAtusnhQMq5x7Hh1k+FxoPTdvvSsRLWfu/oPYBFeeUSbHsybpZqkvsIsY2M+Bnp1lX9Mr/LjPzpUyqbbqLoEquloxIBe2qbNUWi0FSFEIt1nbZZUtHoXzpWYMn1QaeoasiQf3chRZpiu2OeGenUWOGCjqUHm1+9WFSjp2ut+JKdUKWV83U8c8y14fVOVX6qrVs75dH+2Xc6gBFBIer5F8GP7hpYhdYGdbTEnKBY8RoJI8VOlBLhe2s6MJwWPw/SK+rpDA+CBxhpd6aLEPUg26YkdkBM27RdReFtPACWSq2Qq+LVHqsjQaaCbCaIrEXOQC9HillqyQEnn6xhbIjdak5m4Qm6jnmxBYkA8IyOm2Sp+VHGjrzQgdzSoKZGP1p0I84oTlYo5ChLaemO1Z3dozeAenyaiyLMkUUmSlWJ1C6ORniY4KGnAvB5to3q7u4Ucipauw9GRAZpmxpHSzfJKlJtbaDY30hTieQozbEZqzeMIHT7p9Iru8Lb9Mp63lvSmkiO04mZ0jQAzXdpG9TZVjLatiWOsqOPcMKsGN4QqS6nA4HK6bo/H7fXUdo2bGbP4HM5ENwB44aUSHGQI4UbD3gHdzqgCp3JYFhX5/qSoDaktLwyadfqbkSVVTXbEAn29gJ0GS8Jkq9q2v8mSzxJ4CSVQSb2+V1IIgHzG64y0dolOAPTz2CAiRGUvu2dH+98AwdTUbQEOFdOPn3bKm25h+p2+VzJctlqa64cOjdgPa4jhNheEcs84sgP5GyqBJ9wfMLinKR/Pex1U7nWJi4axtgbRQrHsXu2e31BCa2A3eLYk72Dax3wkuwq8jbzDj3T53hgiwy5G6NxrKhYdNKxP9oCeWQ7s4/DxljysZMDtKpscFhdi/4t7wLlFK/r6qWB0Krc+Gw6O7OBamd3ToA1a8Rxwb4/lBGrALUdJ4pHa3aA31qmAV3nU36jIL7BxnhwC3isvMSofPJ2guxWU4ZD7s6R49GlsWeiLHRaP2nSPBnY1Ek/smUSwuAhUlCmx9tBcvbYlsRJ2jZ0S8zq6htJID6on4HWsPbaGSaUFOcGERkLZhVWwGUijkNfW1utMQy9ITMTEsRg7oyQ3w3DElddJPJI9x/vz5lCIwbaUDKdFyzHh3bbjktzwqzdVIdfQj+gMH+nVlckKSL3fHhE5/8N8HvAGSTNbaxUzcbWEfN2NVs5Lck+5p1RmRT5eXmpvDu76rRXJ2rwihdUJnhvbRlWH16WKJGntKItUqWjOhnea1Pe607mquab05OuCVVoKsXocz+cvk6tEFOj6WJCibdiqg1DXKvn1u66TpJndkyKTvBDp/eR1BOPH+1IUaf2piG+6iFoqlSRKYT/A4tZYHUvQt311dW/iWyuk5xdnPsK4H4HniH/Yrd1JAhWb9Y4xhOJ+2r1bzOy3rDKUR2FeB1VX++EHkSUt93T6bGlrUGlRlEH3kmcXWw9i4brX5GT8GLIyi7P/KYyrUyBzcbH6ln8n4MCPICsRlnO9/wBXG8jvokcAvjtZMhPgP66csgbfHr4zWUmR3NqyqvRuxn8fvh9ZUr36qm17LDT+AebpHwYgK/ifFGVZ+urgJZOlI5t691QEfvUNApDVDkVrNO133Vsa3XHwV98g5qftcv2fIv7LvgBEsgIQyQpAJCsAnJr4r5Gt4GR9/RCB8ZH/0+13P/u/pr9ZgH/n/v7sXQREJCsAkawAALK+RrIsOOf28Y/zn92pN4qzr5ysL9c/u1dvFOd/c7Ia/4nrEOHsHeCq0TiLbAFcf4FkfYlsMZxd/wW5eg0P/3N9Hvmq8Oq8f8RytROuPz6cRxzw8b82sYqIiIiIiIiIiIiIiIiIiIiIiIiIiIioxf8ATHGWQBGS6W4AAAAASUVORK5CYII=" alt="Logo OXXO">
                <h1>Hoja de Pago OXXO</h1>
            </div>
            <div class="row">
                <span class="label">Concepto:</span>
                <span class="value">Pago JD shop</span>
            </div>
            <div class="row">
                <span class="label">Monto:</span>
                <span class="value">$<?php echo $total;?> MXN</span>
            </div>
            <div class="row">
                <span class="label">Referencia:</span>
                <span class="value"><?php echo $reference;?></span>
            </div>
            <div class="barcode">
                <?php echo $html;?>
            </div>
            
        </div>
	</div>
</body>
</html>
