<?php use yii\helpers\Url; ?>
<br><br>
<?php if (!Yii::$app->user->isGuest): ?>
<p><a href="<?= Url::to(['result/index']) ?>">Results</a></p>
<?php endif; ?>

<p><a class="btn btn-default" href="http://repetitor.github.io/">Сайт до... &raquo;</a></p>

<style>
/* любой div */
.block{
	padding: 1em;
	/* border: 0.1em solid yellow;
	border-radius: 2em; */
	text-align: center;
}

/*  class="borderRadius" */
.borderRadius{
	padding: 1em;
	border: 0.1em solid green;
	border-radius: 2em;
	text-align: center;
}

/*  class="special" */
.special{
	padding: 1em;
	border: 0.1em solid green;
	border-radius: 2em;
	text-align: center;
}

.leftText{
	text-align: left;
}
.textRed{
	color: red;
}
	</style>
	<link rel="shortcut icon" href="http://horosho.github.io/images/favicon.ico" type="image/x-icon">
	
	
<div class="block">
		<h1>Репетитор</h1>
		<h2> - физика</h2>
		<h2> - химия</h2>
		<h2> - математика</h2>
		<h2> - информатика</h2>
		<h2> - web-программирование</h2>
	</div>
	<div class="block">
		<p><img src="/images/ava/avaTutor.jpg" alt="ava" width="30%" /></p>
	</div>
	
	<!-- <div class="block">
	<p> Спонтанное видео о себе, чисто чтобы вкратце приставить кто я такой (ссылки, упомянутые в видео, находятся в описании под роликом на <a href="https://www.youtube.com/embed/ABuvvpmEGGE" target="blank">ютюбе</a>.)</p> 
		<iframe width="420" height="315" src="https://www.youtube.com/embed/ABuvvpmEGGE" frameborder="0" allowfullscreen></iframe>
	</div> -->
	
	<div class="block">
		Место проведения занятий: у ученика<br>
		Длительность одного занятия: 80 минут<br>
		Стоимость одного занятия: <span id="startPrice">35 </span> BYN <br><br>
		Примечание: оплата меняется в соответствии с изменением минимальной базовой величины в Республике Беларусь<br><br>
		Примечание 2: цена может уменьшится (зависимости от того где живете, как часто занимаемся, регулярность + другие факторы). Т.е. я полагаю так: мои объявления вы находите на репетиторских сайтах, где видете цену  350.000. Получается, если вас цена такая устраивает, тогда меньшая цена тем более должна устроить) В-общем, если называю меньшую цену - не смущайтесь) <br>
	</div>

	
	
<div id="goodPrice" class="borderRadius">

<p> А можно еще дешевле) </p>

<p>
Начало занятия: 
<input type="radio" name="timeStart" value="0"/>13:40
<input type="radio" name="timeStart" value="1"/>14:10
<input type="radio" name="timeStart" value="2"/>14:40
<input type="radio" name="timeStart" value="3"/>15:10
<input type="radio" name="timeStart" value="4" checked="checked"/>15:40
<input type="radio" name="timeStart" value="5"/>16:10
<input type="radio" name="timeStart" value="6"/>16:40
<input type="radio" name="timeStart" value="7"/>17:10
</p>

<p>
Длительность занятия: 
<input type="radio" name="duration" value="1"/>20 мин
<input type="radio" name="duration" value="2" checked="checked"/>50 мин
<input type="radio" name="duration" value="3"/>80 мин
<input type="radio" name="duration" value="4"/>110 мин
</p>

<p>
Место проведения занятия: 
<input type="radio" name="place"  value="online" checked="checked"/>online
<input type="radio" name="place"  value="flat"/>у преподавателя
<input type="radio" name="place"  value="pupil"/>выезд на дом к ученику
</p>

<p>
Способ оплаты: 
<input type="radio" name="wayOfPay"  value="transfer"  checked="checked"/>Перевод на счет
<input type="radio" name="wayOfPay"  value="cash"/>Наличными
</p>

<p>
Время оплаты: 
<input type="radio" name="timeOfPay"  value="moneyBefore"/>перед занятием
<input type="radio" name="timeOfPay"  value="moneyAfter" checked="checked"/>после занятия
</p>

<p><span class="textRed">В результате: </span> <span id="generalSum">13.4</span> BYN</p>

<!-- конвертер валют -->
<style>
<!-- CSS -->
#convertor { padding: 0px; margin: 0px; width:150px; background: #ffffff; height:170px; }
#convertor p, #convertor td { font: normal 11px Helvetica, Georgia, Arial; padding: 2px; margin: 0px; }
#convertor input { border: 1px solid #E9851D; background: #FFFFFF; font: normal 11px Arial, Helvetica, sans-serif; color: #5D781D; width: 65px; }
</style>

<div class="block">
<div id="convertor" class="leftText"><p><a href="http://finance.blr.cc/converter/">Конвертор валют НБРБ</a><br /><span id="dateby"></span></p><span id="bodyby"></span></div>
<script type="text/javascript" src="http://finance.blr.cc/xml/currency_by.js"></script>
<!-- /конвертер валют -->
</div>


<script>

	mbvNow = 21; /* minimal basic value (now), br (160528 - 210.000 br)*/
	minPrice = 0.3 * mbvNow; /*price of 20 min lesson on skype - 62.000 br => 62.000/210.000 = 0.3 */
	increasePrice = 0.005 * mbvNow; /*каждые полчаса цена за полчаса увеличивается на 1.000 br => 1.000 / 210.000 = 0.005 */
	rentPrice = 0.06 * mbvNow; /*если у меня дома, то каждые полчаса к цене добавляется 12.000 br => 12.000 / 210.000 = 0.06 */
	
	var div = document.getElementById('goodPrice');
	div.addEventListener('click', countResult, false);
	
	/* финальный подсчет */
	function countResult() {
		timeStart = valueNow('timeStart'); timeStart = parseInt(timeStart);
		duration = valueNow('duration'); duration = parseInt(duration);
		place = valueNow('place');
		wayOfPay = valueNow('wayOfPay');
		timeOfPay = valueNow('timeOfPay');
		function valueNow(nameValue){
			on = document.getElementsByName(nameValue);
			for (i=0; i<on.length; i++){
				if (on[i].checked){
					valueNowResult=on[i].value;
					return valueNowResult;
				} 
			}
		}
		if(place=='online'){
			price = (minPrice + timeStart * increasePrice) * duration;
		}
		if(place=='flat'){
			price = (minPrice + timeStart * increasePrice + rentPrice) * duration;
		}
		if(place=='pupil'){
			duration = duration + 2;
			price = (minPrice + timeStart * increasePrice) * duration;
		}
		
		if(wayOfPay=='cash'){
			price = price + increasePrice;
		}
		
		if(timeOfPay=='moneyBefore'){
			price = price - increasePrice;
		}
		
		result = price; // цена за занятие
		result=result.toFixed(0);
		result=formatStr(result);
		document.getElementById('generalSum').innerHTML = result;
	}
	/* /финальный подсчет */
	
	/* перевод в денежный формат */
	function formatStr(str) {
		str = str.replace(/(\.(.*))/g, '');
		var arr = str.split('');
		var str_temp = '';
		if (str.length > 3) {
			for (var i = arr.length - 1, j = 1; i >= 0; i--, j++) {
				str_temp = arr[i] + str_temp;
				if (j % 3 == 0) {
					str_temp = ' ' + str_temp;
				}
			}
			return str_temp;
		} else {
			return str;
		}
	}
	/* /перевод в денежный формат */
	
</script>

<table rules="all">
	<tr>
		<td>start\day</td>
		<td>понедельник</td>
		<td>вторник</td>
		<td>среда</td>
		<td>четверг</td>
		<td>пятница</td>
	</tr>
	<tr>
		<td>13:40</td>
		<td>забронировано</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>14:10</td>
		<td>забронировано</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>14:40</td>
		<td>забронировано</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>15:10</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>15:40</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>16:10</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>16:40</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
	<tr>
		<td>17:10</td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
		<td></td>
	</tr>
</table>

</div>

<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ordermy */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="borderRadius">
<p>
Если вам по душе заниматься в группе, возможно, вас заинтересует следующее. Собираемся у меня дома (адрес смотреть в контактах) либо онлайн, занимаемся 90 минут. Стоимость занятия (250 000) делится на всех пропорционально (чем больше людей, тем меньше стоимость).<br>
Понравившиеся варианты отметьте галочками. <br>
</p>

<div class="ordermy-form">

    <?php $form = ActiveForm::begin(); ?>
	
	<?= $form->field($model, 'web')->checkbox() ?>

    <?= $form->field($model, 'phys')->checkbox() ?>

    <?= $form->field($model, 'math')->checkbox() ?>

    <?= $form->field($model, 'chem')->checkbox() ?>

    <?= $form->field($model, 'go')->checkbox() ?>

    <?= $form->field($model, 'many')->checkbox() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6])->label('Пожелания,предложения, дополнительные контакты, комментарии') ?>
	
	<p>
	Как только будет происходить движение по вашему вопросу, вам сразу же на емэйл будет приходить сообщение. Как только группа будет сформирована, также придет email-сообщение и я вам позвоню.
	</p>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'подписаться на новости' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

</div>







<div class="borderRadius">
	<p>Перевести деньги можно следующим образом:</p>
		через ЕРИП: Общереспубликанские->Финансовые услуги->Банки->МТБанк->Пополнение дебетовой карты->В поле "№ договора дебетовой карты"" вводим 38771878 -> Видим мои ФИО, вводим сумму-> Продолжить ->Желательно заполнить поле "имя платежа" -> Оплатить<br>
		<br>
		<a href="https://money.yandex.ru/to/410013737674740" target="blank">Яндекс.Деньги</a> 410013737674740;<br>
		<br>
		webmoney: B162201832503, R343957611880; U429489918152;<br>
        <br>
        PayPal: halva202@gmail.com;<br>
		<!--перевод на карточку МТБанка: 4177 5311 6696 0792, VIKTAR AKULENKA, 08/18;<br>
		перевод на карточку Белинвестбанка: 5578 8434 2001 0690, VIKTAR AKULENKA, 04/18;<br>
		перевод на карточку Беларусбанка: 4255 2005 7760 4119, VIKTAR AKULENKA, 09/18;<br>-->
		<br>
		+ любой другой вариант, который вы предложите<br>
</div>


	<!-- баннер сvr.by -->
	<div class="block">
		Кое-что очень честно:<br>
		В первой половине дня я программист, я работаю в  команде. Данный сайт и другие мои личные сайты я делаю почти сам. У меня есть возможность продвигать эти сайты, привести к современному виду. И, возможно, я когда-то сделаю этот сайт "конфеткой", как делает моя команда другие саты:<br>
		<a href="http://cvr.by/" target="blank"><img src="http://cvr.by/images/125x125.jpg" border="0" width="125" height="125" alt="Web-studio Центр выгодных решений"></a><br>
		Но сейчас я не делаю этого принципиально. Я люблю, когда все максимально просто.<br>
		Я хочу, чтобы на этот сайт попадали целенаправленно.<br>
		Я понимаю, что it-сфера приносит больший доход, нежели преподавание. Но я обожаю преподавать. Да и энергия из меня прет и прет, поэтому 8 часов подряд в день за компом каждый день - пока не совсем для меня)<br>
		Правда, частенько дедлайн сдачи проекта заставляет отменять занятия, поэтому, просьба, это учитывать.<br>
	</div>
	<!-- /баннер сvr.by -->

    

    <div class="borderRadius">
        <p>velcom: +375 29 304-14-63</p>
        <p>life: +375 25 626-80-71 (viber)</p>
        <!--<p>mts: +375 29 575-22-07</p>-->
        <p>skype: viktar.akulenka</p>
        <p>email: halva202@gmail.com</p>
        <p><a target="blank" href="https://vk.com/halva202">vk.com/halva202</a></p>
        <p>
            <a target="blank" href="https://www.facebook.com/halva202">facebook.com/halva202</a>
        </p>
        <p><a target="blank" href="http://halva202.github.io/">сайт-визитка</a></p>
        <p>Виктор</p>
        <div>
            <p><a target="blank" href="<?= Url::to(['site/biography']) ?>">Биография</a></p>
            <p>УНП: AC1163621</p>
        </div>
    </div>

<table><tr>
<td>
<!-- vk.com -->
<script type="text/javascript" src="//vk.com/js/api/openapi.js?116"></script>

<!-- VK Widget -->
<div class="block" id="vk_groups"></div>
<script type="text/javascript">
VK.Widgets.Group("vk_groups", {mode: 2, width: "220", height: "400"}, 70993502);
</script>
<!-- /vk.com -->
</td>
<td>
<!-- fb.com -->
<div class="block" id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.4";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>
<div class="fb-page" data-href="https://www.facebook.com/repetitor4you" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true" data-show-posts="true"><div class="fb-xfbml-parse-ignore"><blockquote cite="https://www.facebook.com/repetitor4you"><a href="https://www.facebook.com/repetitor4you">Tutor4you</a></blockquote></div></div>
<!-- /fb.com -->
</td>
<td> 
Ссылки на репетиторские сайты (буду постепенно наполнять): 
<a href="http://uchim.biz/" target="blank">uchim.biz</a>
</td>
</tr></table>