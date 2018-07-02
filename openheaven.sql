
DROP TABLE IF EXISTS `slider_images`;
CREATE TABLE `slider_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `position` INT(3) NOT NULL,
  `visible` TINYINT(1) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `caption` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
);

DROP TABLE IF EXISTS `gallery_images`;
CREATE TABLE `gallery_images` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `position` INT(3) NOT NULL,
  `visible` TINYINT(1) NOT NULL,
  `filename` varchar(255) NOT NULL,
  `type` varchar(100) NOT NULL,
  `size` int(11) NOT NULL,
  `activity` varchar(255) NOT NULL,
  `place` varchar(255) NOT NULL,
  PRIMARY KEY  (`id`)
);

DROP TABLE IF EXISTS `about`;
CREATE TABLE `about`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `visible` TINYINT(1) NOT NULL,
  `head` VARCHAR(255) NOT NULL,
  `body` TEXT,
  PRIMARY KEY (`id`)
);

INSERT INTO `about` (`visible`, `head`, `body`) VALUES
(1, 'About Open Heaven', 'Hello and welcome to the Open Heaven Travels and Treks! We are a highly experienced, professional and friendly agency, established in 2018. We strive to instil respect for our country and its sacred mountains.We take pride in doing our part to preserve its natural beauty; the way of life of its people and its rich cultural heritage. We would like to introduce ourselves as one of the best trekking companies in Nepal.
<br>
The OHTT is dedicated to providing excellent and personalized service. Together with you, we carefully plan and supply all the information necessary for your safety, comfort and enjoyment. The rich cultural spirit, the unique blend of Buddhism and Hinduism; the birth place of Lord Gautam Buddha; the home of Mount Everest; the mighty rivers and the World Heritage sights. This is our country, and it has something for everyone. We will give you an excellent opportunity to explore our beautiful Nepal.
<br>
We can organize any type of tour or trek; ranging from accommodation in fully serviced tea houses, serviced camping, and trekking to the peaks of Nepal.
<br>
<ul class="list-group">
  <li class="list-group-item">
    <b>What makes us the team for you?</b>
  </li>
  <li class="list-group-item">
    <i class="fa fa-check-square"></i> Experienced and professional trekking team</li>
  <li class="list-group-item">
    <i class="fa fa-check-square"></i> Gentle and unobtrusive style of guiding</li>
  <li class="list-group-item">
    <i class="fa fa-check-square"></i> Flexible, tailor-made treks</li>
</ul>');

DROP TABLE IF EXISTS `tours`;
CREATE TABLE `tours`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `position` INT(3) NOT NULL,
  `visible` TINYINT(1) NOT NULL,
  `destination` VARCHAR(255) NOT NULL,
  `tour_name` VARCHAR(255) NOT NULL,
  `activities` VARCHAR(255) NOT NULL,
  `tour_duration` VARCHAR(255) NOT NULL,
  `tour_grade` VARCHAR(255) NOT NULL,
  `seasons` VARCHAR(255) NOT NULL,
  `group_size` VARCHAR(255) NOT NULL,
  `altitude` VARCHAR(255) NOT NULL,
  `accommodation` VARCHAR(255) NOT NULL,
  `transport` VARCHAR(255) NOT NULL,
  `overview` TEXT,
  `itinenarary` TEXT,
  `cost_info` TEXT,
  `gallery` TEXT,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `treks`;
CREATE TABLE `treks`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `position` INT(3) NOT NULL,
  `visible` TINYINT(1) NOT NULL,
  `trip_duration` VARCHAR(255) NOT NULL,
  `trek_duration` VARCHAR(255) NOT NULL,
  `start_end_place` VARCHAR(255) NOT NULL,
  `trek_name` VARCHAR(255) NOT NULL,
  `trek_type` VARCHAR(255) NOT NULL,
  `trek_grade` VARCHAR(255) NOT NULL,
  `seasons` VARCHAR(255) NOT NULL,
  `group_size` VARCHAR(255) NOT NULL,
  `altitude` VARCHAR(255) NOT NULL,
  `highlights` TEXT,
  `walking_hours` VARCHAR(255) NOT NULL,
  `cost` VARCHAR(255) NOT NULL,
  `overview` TEXT,
  `itinenarary` TEXT,
  `cost_info` TEXT,
  `equipments` TEXT,
  `gallery` TEXT,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `testimonials`;
CREATE TABLE `testimonials`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `position` INT(3) NOT NULL,
  `visible` TINYINT(1) NOT NULL,
  `quote` TEXT NOT NULL,
  `footer` VARCHAR(255) NOT NULL,
  PRIMARY KEY (`id`)
);

DROP TABLE IF EXISTS `admins`;
CREATE TABLE `admins`(
  `id` INT(11) NOT NULL AUTO_INCREMENT,
  `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `username` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `hashed_password` VARCHAR(255) NOT NULL,
  `token` TEXT,
  PRIMARY KEY (`id`),
  INDEX (username)
);
INSERT INTO `admins` (`username`, `email`, `hashed_password`, `token`) VALUES /* password: Openheaven*/
('openheaventravels', 'mee_prakash25@hotmail.com', '$2y$10$SR31J30vnHzwH.m8YjnveOkBDQUnw1R/o6cHmodpWbMftEuvfpQHy', '');

INSERT INTO `testimonials` (`position`,`visible`, `quote`, `footer`) VALUES
(1, 1, '\"Amazing experience of Nepal - Dinesh is a great guide! We learned lots, saw lots and had lots of fun! The whole family had such a fantastic time! Cannot wait to come back!\"','Rachel Wilkinson'),
(2, 1, '\"Open Heaven Travel and Treks were nothing but helpful during our time in Nepal. Dinesh is a great guide and incredibly friendly. He knew a lot about the local areas and showed us some incredible places. I would thoroughly recommend these guys and will definitely be contacting you again when I return to Nepal! Thank you for making our time special and particularly Dinesh for being a brilliant guide and an even better friend.\"', 'Georgia Heggs');




INSERT INTO `tours` (`position`, `visible`, `destination`, `tour_name`, `activities`, `tour_duration`, `tour_grade`, `seasons`, `group_size`, `altitude`, `accommodation`, `transport`, `overview`, `itinenarary`, `cost_info`, `gallery`) VALUES
(1, 1,'Sindhupalchowk, Nepal', 'BhoteKoshi River Bungy Jump', 'Adventure Sports', '01 Day(s)', 'Moderate', 'Jan-Dec', '2 to 25', '1365m', 'Hotel/Guest House/ Lodge', 'Drive', '<table class=\"table table-striped \">
  <tr>
    <td>
      <p>
        <b>Bhotekoshi River Bungy Jump</b> is the highest bungy jump in the Nepal which is located at Sindupalchwok
        district. Here is a rare opportunity to do something different and exhilarating in Nepal; a Bungee
        Jump.A three hour drive from Kathmandu along the Arniko (Kathmandu/Lhasa) highway will take you to
        an amazing new bridge where the Bungee is located. At this point you are a mere 12 km from the Tibet
        border and the famous Friendship Bridge.
        <br>
        <br>
        <b> Location</b>
        <br> A three hour driving outside of Kathmandu Valley. You will travel the Arniko (Kathmandu/Lhasa) Highway
        to within 12km of the Tibet Border and the famous Friendship Bridge.
        <br>
        <br>
        <b> The Bridge</b>
        <br> The bridge is Swiss designed, especially for Bungee jumping, and is the longest suspension bridge
        in Nepal. It has over 6000 meters of steel wire and has a load capacity of 41500kg, or 4.5 tones.
        One of New Zealand\'s leading Bungee consultants designed the jump and it is operated by some of the
        most experienced jump masters in the business. As they have done in New Zealand, safety is paramount
        with this operation. The bridge has been a wonderful benefit for the local community. Before it was
        constructed, it took locals five hours to cross the great valley that is split by the mighty Bhote
        Kosi River. So, if you want an amazing adrenaline rush, this is the place to go. Your weight will
        be checked, so you get the jump of your choice (close to the water if you choose) and other safety
        requirements will be explained. Ask people who have done a Bungee and they will tell you: \"Do it
        once and you will want to do it again\".
      </p>
    </td>
  </tr>
</table>', '<table class=\"table table-hover\">
  <tr>
    <td class=\"text-nowrap\">Day 1</td>
    <td>
      <b>Kathmandu drive to Last Resort (4-5 hrs drive)</b>
      <br>
      Drive to Last Resort (Ultimate Bungy Sport) after arrival, you will be briefed and prepared for Bungy.
      After the jump, rest overnight at Last Resort or drive back to Kathmandu. This is the short day tour
      to Bungy in Nepal. If you have enough time then you can plan ahead as given below.
    </td>
  </tr>
  <tr>
    <td>Day 2</td>
    <td>
      <b>Cannoning and Bhote Koshi River Rafting</b>
      <br> After breakfast beautiful cannoning tour to The Bhote Koshi River cliff. This is also one of the most
      exciting adventure tours when combined with Bungy.
    </td>
  </tr>
  <tr>
    <td>Day 3</td>
    <td>
      <b>River Rafting</b>
      <br> Rafting tour on Bhote Koshi River for every adventure lover can enjoy its many challenging rapids
      and overnight camp.
    </td>
  </tr>
  <tr>
    <td>Day 4</td>
    <td>
      <b>Rafting and Back to Kathmandu (4 hrs drive)</b>
      <br> After breakfast continue rafting again and after that drive back to Kathmandu.
      <br>
      <b>Note: We have one day package also start from Kathmandu and return same day after Bungy tour if you want bungy tour only.</b>
    </td>
  </tr>
</table>', '<table class=\"table\">
  <tr>
    <td>
      <ul class=\"list-group\">
        <li class=\"list-group-item\">
          <b>Cost Include</b>
        </li>
        <li class=\"list-group-item\">
          <i class=\"fa fa-check-square\"></i> Airport picks up & drops by private vehicle according your group.</li>
        <li class=\"list-group-item\">
          <i class="fa fa-check-square"></i> Standard accommodation at hotel in Kathmandu.</li>
        <li class=\"list-group-item\">
          <i class=\"fa fa-check-square\"></i> Guided city tour in Kathmandu by private vehicle according your tour.</li>
        <li class=\"list-group-item\">
          <i class=\"fa fa-check-square\"></i> All your fees for Bungy Jumping.</li>
        <li class=\"list-group-item\">
          <i class=\"fa fa-check-square\"></i> Transportation from and to Bungy point (the last resort).</li>
        <li class=\"list-group-item\">
          <i class=\"fa fa-check-square\"></i> All our government taxes.</li>
      </ul>
    </td>
  </tr>
  <tr>
    <td>
      <ul class=\"list-group\">
        <li class=\"list-group-item\">
          <b>Cost Exclude</b>
        </li>
        <li class=\"list-group-item\">
          <i class=\"fa fa-times\"></i> Your meals and drinks whilst in Kathmandu.</li>
        <li class=\"list-group-item\">
          <i class=\"fa fa-times\"></i> Tips for staff and driver-Tipping is expected.</li>
        <li class=\"list-group-item\">
          <i class=\"fa fa-times\"></i> Any others expenses which are not mentioned on Price Includes section.</li>
      </ul>
  </tr>
</table>', '<div class=\"row no-gutters popup-gallery\">
  <div class=\"col-lg-4 col-sm-6\">
    <a class=\"gallery-box\" href=\"<?php echo url_for(\'images/homepage_assets/gallery/fullsize/1.jpg\'); ?>\">
      <img class=\"img-fluid sr-image\" src=\"<?php echo url_for(\'images/homepage_assets/gallery/thumbnails/1.jpg\'); ?>\" alt=\"\">
      <div class=\"gallery-box-caption\">
        <div class=\"gallery-box-caption-content\">
          <div class=\"project-category text-faded\">
            Category
          </div>
          <div class=\"project-name\">
            Project Name
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class=\"col-lg-4 col-sm-6\">
    <a class=\"gallery-box\" href=\"<?php echo url_for(\'images/homepage_assets/gallery/fullsize/2.jpg\'); ?>\">
      <img class=\"img-fluid sr-image\" src=\"<?php echo url_for(\'images/homepage_assets/gallery/thumbnails/2.jpg\'); ?>\" alt=\"\">
      <div class=\"gallery-box-caption\">
        <div class=\"gallery-box-caption-content\">
          <div class=\"project-category text-faded\">
            Category
          </div>
          <div class=\"project-name\">
            Project Name
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class=\"col-lg-4 col-sm-6\">
    <a class=\"gallery-box\" href=\"<?php echo url_for(\'images/homepage_assets/gallery/fullsize/3.jpg\'); ?>\">
      <img class=\"img-fluid sr-image\" src=\"<?php echo url_for(\'images/homepage_assets/gallery/thumbnails/3.jpg\'); ?>\" alt=\"\">
      <div class=\"gallery-box-caption\">
        <div class=\"gallery-box-caption-content\">
          <div class=\"project-category text-faded\">
            Category
          </div>
          <div class=\"project-name\">
            Project Name
          </div>
        </div>
      </div>
    </a>
  </div>
</div>');

INSERT INTO `treks` (`position`, `visible`, `trip_duration`, `trek_duration`, `start_end_place`, `trek_name`, `trek_type`, `trek_grade`, `seasons`, `group_size`, `altitude`, `highlights`, `walking_hours`, `cost`, `overview`, `itinenarary`, `cost_info`, `equipments`, `gallery`) VALUES
(1, 1, '22 Days', '17 Days', 'Lukla - Lukla', 'Everest High Pass Trek - 22 days', 'Tea House', 'Strenuous ', 'Early spring and November', '2 to 10 person', '5545m', '
This trek to Everest through high passes is a window into traditional Sherpa villages and \'Gompas\', Buddhist culture, sacred peaks and the valley. Throughout the trek, we are surrounded by spectacular 8000 meter peak panoramas coupled with welcoming and friendly villagers.
<br>
<br>
<b>Himalayan sights:</b>
<br>
- Mt.Everest
<br>
- Mt.Cho Oyu
<br>
- Mt.Lhotse
<br>
- Mt.Nuptse
<br>
- Mt.Pumori
<br>
- Mt.Amadablam etc.
', '4-5 hrs a day', '$1500 per person', '<table class=\"table table-striped\">
<tr>
  <td>
      <b>Everest High Pass Trek</b> is the ultimate trek for the fittest and most adventurous trekkers and is one of the most exciting in the Everest Region. It involves a circular route trekking over 3 high passes, all over 5000m high - the Kongma La Pass (5535m), Renjo La Pass (5338m) and the Chola -La Pass (5368m). The trek even takes you to Everest Base Camp. Emerging over the passes you will be rewarded each time with new stunning views of the magnificent landscapes of fabulous peaks, tapering ridges and colorful villages. You will ascend to the best placed viewpoints to take in the wonderful landscape and view the highest peaks. It is an unforgettable journey.
      <br>
      <br>
      <i>The Everest High Pass</i> Trek begins in the same way as the Everest Base camp trek, with a short 40 minute flight to Lukla, followed by several days trekking through colourful Sherpa homelands before arriving at the famous bustling market town of Namche Bazaar. You spend an important 2 days acclimatizing here while exploring the town and experiencing the high pasture settlement of Dinbuche.
      <br>
      <br>
      Then you embark on the amazing circular route, from which there are incredible views of four of the world\'s highest peaks including Cho Oyu (8201m), Makalu (8463m), Lhotse (8516m) and Mount Everest (8,848m). You will visit the largest glacier in Nepal, the Ngozumpa Glacier. The Gokyo Ri pass is reputed to have the best viewpoint in the entire Himalayas and the Renjo La Pass is off the beaten track giving a wonderful views of the Lakes on both sides of the pass. And amongst this amazing trek you will visit the iconic Everest Base Camp from which climbers embark on their attempts at the summit. Combine this stunning itinenarary with meeting friendly local people, picturesque villages, culture traditions and wildlife and you have a trek which has everything - it is tough but incredibly rewarding and fulfilling.
      <br>
      <br>
      <b> The Best Time to Visit Everest High Pass Trek</b>
      <br> Early spring and November are the perfect times to trek in the Everest region; you can enjoy the best views of the clear parks coupled with blue skies without the hoards of the other trekkers who come during the peak seasons.
      <br>
      <br>
      <h6><b>Earthquake Update</b></h6>
      As per the <a href="http://www.tourism.gov.np" target="_blank">tourism.gov.np</a> Khumbu Region is fully safe for Trekking.
      <br>
      <br>
      <h4>Some Related Information</h4>
      <b>The Trekking Day</b>
      <br>
      While you are on trekking in Everest High Pass Trek you will stay in Tea House, You will have nice Tea House During the Trek for Everest High Pass Trek, before you departure to Trekking you will need to pack up your trekking bag before your breakfast in Tea House, as porters will set off early. After breakfast we need to walk approximately 3-4 hours for lunch time, some time in some places it takes 4-5 hrs. After a relaxing your lunch, you typically spend around 2-3 hours or even more sometimes on the trail before reaching your stopping point. Throughout the day, you will take frequent rest breaks and take time to admire the fascinating mountains views. You take plenty of pictures of yourself with incredibly panoramic mountains of Everest Region, rivers, landscapes, Buddhist prayer flags, temples, shrines, cairns, monasteries, etc. Once you arrive at your tea house, you take a rest and Dinner is generally around 7pm. After your dinner our guide will take your breakfast order for tomorrow and he will give you briefing for tomorrow trip.
      <br>
      <br>
      <b> What you carry in your day pack bag ?</b>
      <br> You need to carry your day pack for your personal items like your water bottle, your money, and some others medicine, camera etc.Your guide will let you know each evening of any extra items you will need for the following day. If you have a comfortable day pack you load will only be a few kilograms and hardly noticeable.
      <br>
      <br>
      <b>Food</b>
      <br>
      In Kathmandu part we provide breakfast but during the trek we have three meal (Breakfast, Lunch and Dinner), Every Tea House have their own menu so you can order menu food item but if you have big group like 20 pax guide will choose the food for you.
      <br>
      <br>
      <b>accommodation</b>
      <br>
      Accommodation in Kathmandu we will provide you deluxe room with private facilities on Breakfast basic. During the Trekking you will have Tea House and is of a basic (normal) standard. Twin Rooms or multi share with basic shared toilet facilities. Hot Showers are available in some places but they will charge directly to client when they ask for hot shower. and if you wish to book tented camp (Camping trekking) instead of tea house Himalaya Trekking Team will provide two men tent for two people to share the accommodation on tent camp.
      <br>
      <br>
      <b>Transportation</b>
      <br>
      Transportation within Kathmandu valley is done with Cars or Jeeps, Van, Hiace, Coaster bus, Mini bus, Coaches depending upon the group size. In trekking region, transportation mean is hiking and in some cases Yaks / horses and donkeys are used for baggage carriage. In this trekking route, hiking is the major mean of transportation while your baggage will be carried by porters .
      <br>
      <br>
      <b>Trekking Staff</b>
      <br>
      The Guide is in overall charge of the trek and looking after you. This is the person you should go to with all problems, concerns and questions. All our guides are well trained in all aspects of trekking, conservation, high altitude medicine, and first-aid and emergency procedures. They are professionals selected for their knowledge and passion for Nepal and its peoples.
      <br>
      <br>
      <b>Porters</b>
      <br>
      Transport your Trekking Bag - one porter for every two trekkers in Tea house trekking and camping (Tented camp) trekking it is depend on luggage /equipment that we need for your camping trekking.
      <br>
      <br>
      <b>Trek Grading</b>
      <br>
      Remember Everest Base Camp Trek is Adventure Trekking in Nepal so you should have well fitness level and well prepared, before you come to Everest Trekking its much better to go Swimming, Cycling or walk every day 4 km. Remember that no trek in the Himalaya is a stroll as all involve going up and down at altitude and that altitude affects everyone differently.
      <br>
      <br>
      <b>Money</b>
      <br>
      It should be better to bring the USD in Nepal. Because you can change everywhere easily.
      <br>
      <br>
      You should exchange enough money into Nepalese Rupees to last the entire time of your trek before leaving Kathmandu. You can find the money exchange counters near your hotel also can get in trekking trails but they will take more commission.
      <br>
      <br>
      <b>Tipping</b>
      <br>
      Tipping is a personal and voluntary matter and tips are not included in the trip price but who will working for you they are expect the tips so you can give tips directly to them at end of your trekking / tours and tipping is not any limitation so you can give tips as much you like if they will make you happy.
      <br>
      <br>
      <b>Insurance</b>
      <br>
      It is main important part of the trip. Your Travel insurance is not included in the trip price. Your travel insurance must provide cover against personal accident, medical expenses, emergency evacuation and repatriation (including helicopter evacuation) and personal liability. is included trekking crews\' against personal accident.
      <br>
      <br>
      <b>Health</b>
      <br>
      There are no specific health requirements for travel into Nepal. However, for the trekking in Himalayas, you are in excellent health with average physical fitness and have positive attitude, self confidence and strong determination, you can accomplish this trek successfully but you should consult your doctor for up-to-date information regarding vaccinations, high altitude medication and medications for any reasonably foreseeable illnesses whilst traveling in Nepal. Some part of trekking have a small health post for emergency treatment with limited equipment, limited health workers and medication. Be aware that some drugs, including anti-malarial, have side effects at altitude. Please discuss this carefully with your doctor.
      <br>
      <br>
      Please be aware that you will be in remote areas and away from medical facilities for some time during this trip. We strongly recommend that you carry a personal First Aid kit as well as sufficient quantities of any personal medical requirements (including a spare pair of glasses).
      <br>
      <br>
      <b>High Altitude Sickness</b>
      <br>
      AMS \(acute mountain sickness\) is a serious issue. It is the result of the failure of the body to adapt to high altitude and can affect anyone, regardless of age or fitness. It usually occurs above 1,800 meters and the likelihood of being affected increases as you ascend. The way to reduce the affects of altitude is to ascend slowly, 300 meters per day above 3,000 meters until you have acclimatized. Poor acclimatization results in headache, nausea, sleeplessness, difficulty breathing and swelling of fingers and glands. The only cure for AMS is to descend to lower altitude and your guide\'s decision on this matter is final. When you are planning to trek above 3,000 meters we recommend not walks faster. If you will get altitude sickness please consult with your guide to go down at least 500 meters to recover.
      <br>
      <br>
      <b>Nepal Visa</b>
      <br>
      Multiple entry visas are available on arrival at Kathmandu airport and all land borders except the citizens of Nigeria, Ghana, Zimbabwe, Swaziland, Cameroon, Somalia, Liberia, Ethiopia, Iraq, and Palestine, Afghanistan. Multiple entry visas can be obtained from the immigration points costing US Dollars 25 or other convertible foreign currency equivalent thereto for 15 days multiple entry visas, US Dollars 40 or other convertible foreign currency equivalent there to for 30 days multiple entry visa, US Dollars 100 or other convertible foreign currency equivalent thereto for 90 days multiple entry visa.
      <br>
      <br>
      <b>Important Note:</b>
      <br>
      If not really satisfied with above itinenarary, we can design individualized travel plans based on your preferences. Also bad weather at Lukla can result into cancellations of flights. We would like to strongly suggest you to have some spare days at the end of the trek and also a travel insurance that partially or fully covers the sum of emergency evacuation to catch up the international flights.
    </p>
  </td>
</tr>
</table>', '<table class=\"table table-hover\">

<tr>
  <td class=\"text-nowrap\">Day 1</td>
  <td>
    <b>Arrival in Kathmandu airport</b>
    <br>
    Representatives from Himalaya Trekking Team will welcome you at Tribhuvan International Airport upon your arrival. Then they will transfer you to the hotel for one overnight stay.
    </td>
</tr>
<tr>
  <td>Day 2</td>
  <td>
    <b>Trek preparation and Kathmandu Valley Sightseeing Tour</b>
    <br>
    Today you visit different historical and cultural sites of the Kathmandu valley with our guide. In the morning after having breakfast you go visit Buddhist and Hindu temples Boudhanath, Pashupatinath, Swayambhunath, which reflect the local culture and tradition of Nepalese society. Then in the afternoon you visit Kathmandu Durbar square and Patan durbar square. In the evening you return to the Hotel.
    </td>
</tr>
<tr>
  <td>Day 3</td>
  <td>
    <b>Fly to Lukla 40m flight and Trek to Phakding (2652mt) 3 hrs, Overnight at Hotel</b>
    <br>
    Today we will escort you to the domestic terminal of Kathmandu Airport for a morning Lukla flight. During the flight you can see very green places and white mountains. After a 40 minute flight we arrive at Lukla Airport, also called Tenzing-Hillary Airport. Upon arrival at Lukla we will meet other members of the Himalaya Trekking Team. After some tea, coffee and packing we will start our trek through Chaurikharka village and descend towards Dudhkoshi Ghat and Phakding. Enjoy your free time in the popular stopping point Phakding.
  </td>
</tr>
<tr>
  <td>Day 4</td>
  <td>
    <b>Trek to Namche Bazaar (3440mt) 6 hrs, Overnight at Hotel</b>
    <br>
    After breakfast we will walk through a beautiful pine forest. The track leads us along the Dudhkoshi river via many suspension bridges to Monjo, about two hours away. Today we can see the wonderful prospect of the glistening Mt Thamserku (6618m). We come to the check post and entrance to the Sagarmatha National Park. After the check post we will pass the last village of Jorsale before reaching  Namche Bazaar. After pass the Jorsalle village, we will follow the Dudhkoshi river for half an hour and again cross a suspension bridge. We walk all the way up to Namche Bazaar for a couple of hours, which is well known as the capital of Khumbu region. Large Sherpa village of Khumbu.
  </td>
</tr>
<tr>
  <td>Day 5</td>
  <td>
    <b>Acclimatization day in Namche Bazar</b>
    <br>
    Today is our acclimatization day at Namche Bazaar.  After breakfast, we make a short excursion around Namche Bazaar which is the main centre of the Everest region and a big Sherpa village of the Khumbu region. There are government offices, ATM, Internet, Shops and many bakeries. Our guide will take you to visit the Sagarmatha National Park Headquarters and Everest View Hotel for a panoramic view of many white peaks. Visit the Sherpa museum for an overview of traditional Sherpa culture and history of mountaineering.
  </td>
</tr>
<tr>
  <td>Day 6</td>
  <td>
    <b>Trek to Tengboche (3860mt) 5 hrs, Overnight at Hotel</b>
    <br>
    We begin today\'s trek on an easy trail to Phunki Thanga. From here we ascend towards Tengboche village which is home to the largest monastery in the Everest region. The monastery is located within the Sagarmatha National Park and provides panoramic views of the highest mountains on earth including Everest, Ama Dablam, Thamserku, Nuptse and Lhotse. We try  to reach the monastery by 3:00 in the afternoon and may even be able to witness a religious Buddhist ceremony.
  </td>
</tr>
<tr>
  <td>Day 7</td>
  <td>
    <b>Trek to Dingboche (4410mt) 5 hrs, Overnight at Hotel</b>
    <br>
    After breakfast in Tangboche we start our trek down to Diboche village through the rhododendron forest. We cross the suspension bridge of Imja Khola and climb to Pangboche past almost thousands of Mani stones. After that we arrive at the beautiful village of Pangboche. Enjoy a great opportunity to observe a typical Sherpa village. In Pangboche there is one of the oldest monasteries in this area. Our uphill trail continues to Dingboche with spectacular views of Lhotse, Island Peak & Ama Dablam. The afternoon trek will be a little difficult due to the landscape giving way to dry and deserted mountainous terrain. After 5 hours walk from Tyanboche we finally arrive in Dingboche. This is also the gateway to Chukung Village and Islang peak.
  </td>
</tr>
<tr>
  <td>Day 8</td>
  <td>
    <b>Trek to Chhukung 4700mt, 2 hrs, Overnight at Hotel</b>
    <br>
    Today you can enjoy another day for acclimatization with only two hours of walk. We will have trip to Chhukung valley via the Imja Khola valley. We get a marvelous view of the surrounding mountains, especially Lhotse\'s massive south wall.
  </td>
</tr>
<tr>
  <td>Day 9</td>
  <td>
    <b>Hiking to Chhukung Ri 5540mt and return 5/6 hrs, Overnight at Hotel</b>
    <br>
    It is best to spend a night in Chhukung before crossing the Kongma La pass. This will help for acclimatize to the weather and prepare us for the next day\'s trek. Chhukung Ri is located directly above the Chhukung village. The climb to Chhukung Ri involves some easy scrambling near the summit. From the top, we can look directly across the valley for a fantastic view of Ama Dablam and Amphu Labsa peaks. We descend back to Chhukung to spend the night.
  </td>
</tr>
<tr>
  <td>Day 10</td>
  <td>
    <b>Trek to Lobuche (4910mt) 6 hrs via Kongma La pass 5335mt, Overnight at Hotel</b>
    <br>
    This day is difficult as we cross Kongma La pass. At first we walk in the plain area in the valley and then ascend the steep path to the Kongma La pass amid the crags of this outlying ridge from nearby Nuptse. From the pass we descend steeply to the Khumbu Glacier. We cross the glacier and head to Lobuche.
  </td>
</tr>
<tr>
  <td>Day 11</td>
  <td>
    <b>Trek to Gorekshep (5100mt) and continue to Everest Base Camp (5365mt) then back to Gorekshep 8 hrs, Overnight at Hotel</b>
    <br>
    This is another big and difficult day walk along the Khumbu Glacier and up to Everest Base Camp at 5365meters, the closest you can get to Mt. Everest without mountaineering equipment. There will likely be a team there about to attempt the summit. The view of the Khumbu Icefall from Base Camp is spectacular. We return back to Gorak shep for the night. Overnight at Guesthouse.
  </td>
</tr>
<tr>
  <td>Day 12</td>
  <td>
    <b>Hiking to Kalapattar (5545mt) - Gorekshep - Dzongla (4710 mt) 7 hrs, Overnight at Hotel</b>
    <br>
    This will be one of the most difficult yet rewarding days of the trek. In the morning we climb Mt. Kala Patar, a small peak. From Kalapattar we can see the most magnificent mountain panorama of Everest, the highest point on the planet at 8848meters, towers directly ahead and other giants, Nuptse, Pumori, Chagatse, Lhotse and countless others. Then we walk to Dzongla.
  </td>
</tr>
  <tr>
  <td>Day 13</td>
  <td>
    <b>Trek to Thangna via crossing Cho La pass (5370mt) 7 hrs, Overnight at Hotel</b>
    <br>
    This day we cross another high pass, Chola pass. We have to walk in the steep path over rock boulders. The the climbing is difficult, the views of the route ahead, and of the glacier itself, are breathtaking. From the pass we can see the stunning view of the surrounding mountains. Then we descend down in another side of the pass and trek to Thangnag for overnight stay.
  </td>
</tr>
  <tr>
  <td>Day 14</td>
  <td>
    <b>Trek to Gokyo lakes (4790mt) 3.30 hrs, Overnight at Hotel</b>
    <br>
    We walk along the glacier route until we reach first Lake of Gokyo. The trek is easier over flat path following Dudh Koshi River up to Gokyo. It is a windy valley and situated near the third lake. At Gokyo you are stunned by the natural beauty of Dudh Pokhari Lake.
  </td>
</tr>
  <tr>
  <td>Day 15</td>
  <td>
    <b>Hiking to Gokyo RI and back to Gokyo Lake, 4.30 hrs, Overnight at Hotel</b>
    <br>
    This day we take rest and explore the Gokyo valley. Gokyo is a trade centre where the Sherpa people run lodges to provide the best services to the trekkers. Gokyo is situated by the side of Ngozumba glacier, the biggest glacier of Nepal.
  </td>
</tr>
  <tr>
  <td>Day 16</td>
  <td>
    <b>Trek to Lunden (4300mt) via crossing Renjo La pass (5340mt) and. 7 hrs, Overnight at Hotel</b>
    <br>
    This day early in the morning we cross the Renjo La pass. From the pass we can see the views of Everest, Lhotse and surrounding mountains. We also see the beautiful scenery of the Gokyo Lake and Gokyo village below the Ngozumba glacier. From the pass we descend down on a stone staircase to Lunde where we stay overnight.
  </td>
</tr>
  <tr>
  <td>Day 17</td>
  <td>
    <b>Trek to Thame (3800mt) 4 hours, Overnight at Hotel</b>
    <br>
    This day we trek down to Thame, a sprawling village. From Thame we can see the stunning views of the mountains like Thamserku, Kantenga, Kusum Kangguru etc. here you can explore the village and visit monastery established around 300 years ago.
  </td>
</tr>
  <tr>
  <td>Day 18</td>
  <td>
    <b>Trek to Namche Bazaar (3440mt) 4 hrs, Overnight at Hotel</b>
    <br>
    Today, we begin our walking in the flat trail and then descending to Thamo. In Thamo you can visit the Khari Gompa where you find Nuns and monks. Then we head to Namche bazaar. Overnight at Namche Bazaar.
  </td>
</tr>
  <tr>
  <td>Day 19</td>
  <td>
    <b>Trek to Lukla (2800mt) 7 hrs, Overnight at Hotel</b>
    <br>
    We begin our trek with a descent. As we continue our trek, we cross several bridges over the fast flowing Dudh Koshi River and its tributaries.  Now the trail has become more level and natural. On our trek we enjoy walking on open plains, through rhododendron and pine forests and enjoy distant views of the snow covered peaks. We walk through Sherpa villages noticing their impressive faith in Buddhism and the culture of prayer stones and prayer flags. After reaching Lukla, we stretch those sore legs and recall the experiences of the last couple of weeks. Our long trek to the mountain and its high passes ends today.
  </td>
</tr>
  <tr>
  <td>Day 20</td>
  <td>
    <b>Fly back to Kathmandu (1310mt)</b>
    <br>
    The flights to Kathmandu are usually scheduled for morning for safety purposes. After reaching the capital city, we have the rest of the day off to past the time as we please. We could take a rest in our hotel room or shop for souvenirs for our loved ones. In the evening, there will be a farewell dinner to celebrate the successful completion of your journey to the mountains.
  </td>
</tr>
  <tr>
  <td>Day 21</td>
  <td>
    <b>Leisure day in Kathmandu, in case of bad weather of Lukla. Overnight at hotel, inclusive of breakfast</b>
    <br>
  </td>
</tr>
  <tr>
  <td>Day 22</td>
  <td>
    <b>Final departure to your onward destination. \"Farewell!\"</b>
    <br>
    A representative from the Himalaya Trekking Team will assist you to the airport for departure. You will know we have done everything we can to give you with an unforgettable experience in Nepal. We hope you will return.
  </td>
</tr>
</tr>
</table>', '<table class=\"table\">
<tr>
  <td>
    <ul class=\"list-group\">
      <li class=\"list-group-item\">
        <b>Cost Include</b>
      </li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-check-square\"></i> All airport/hotel transfers</li>
      <li class=\"list-group-item\">
        <i class="fa fa-check-square"></i> 3 nights Hotel in Kathmandu with BB plan</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-check-square\"></i> All accommodation and meals during the trek</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-check-square\"></i> A full day sightseeing tour in Kathmandu valley including tour guide and entrance fees</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-check-square\"></i> Kathmandu Lukla Kathmandu round airfare and airport TAX</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-check-square\"></i> An experienced English-speaking trek leader or guide and Sherpa porters to carry including their salary, insurance, equipment, flight, food and lodging</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-check-square\"></i> All necessary paper work and permits</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-check-square\"></i> Sleeping Bags and Duffel bags for trekking</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-check-square\"></i> A comprehensive medical kit</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-check-square\"></i> Trekking Achievement Certificate</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-check-square\"></i> All government and local taxes</li>
    </ul>
  </td>
</tr>
<tr>
  <td>
    <ul class=\"list-group\">
      <li class=\"list-group-item\">
        <b>Cost Exclude</b>
      </li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-times\"></i> Nepal Visa fee (bring small denomination USD cash and two passport photographs)</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-times\"></i> International airfare to and from Kathmandu</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-times\"></i> Excess baggage charges</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-times\"></i> Extra night accommodation in Kathmandu because of early arrival, late departure, early return from mountain (due to any reason) than the scheduled itinenarary</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-times\"></i> Lunch and evening meals in Kathmandu</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-times\"></i> Personal expenses (phone calls, laundry, bar bills, battery recharge, extra porters, bottle or boiled water, shower etc.)</li>
      <li class=\"list-group-item\">
        <i class=\"fa fa-times\"></i> Tips for guides and porters & Rescue insurance</li>

    </ul>
</tr>
</table>', '<table class=\"table\">
<tr>
  <td class=\"text-nowrap\">Clothing</td>
  <td>
    <br>
    Sun hat or scarf
    <br>
    Fleece jacket with wind-Stopper
    <br>
    Waterproof shell jacket
    <br>
    Down vest and/or jacket (can hire here in Nepal also)
    <br>
    Lightweight gloves
    <br>
    Heavyweight gloves or mittens with a waterproof shell outer
    <br>
    Light and expedition weight thermal bottoms
    <br>
    Fleece or wool pants
    <br>
    Waterproof (preferably breathable fabric) shell pants
    <br>
    Thick, warm wool hiking socks
    <br>
    Hiking boots with spare laces
    <br>
    Sunglasses with UV protection
  </td>
</tr>

<tr>
  <td>Accessories</td>
  <td>
    <br>
    Sleeping bag rated to zero degrees Fahrenheit
    <br>
    Trekking poles (sticks)
    <br>
    Headlamp
    <br>
    Trek bag-pack (provided by Trekking Mart)
    <br>
    Basic First Aid Kit
    <br>
    Daypack (approximately 2,500 to 3,000 cubic inches)
    <br>
    Thermo-rest sleeping pad
    <br>
    Water bottles
    <br>
    Small wash towel
  </td>
</tr>

<tr>
  <td>Toiletries</td>
  <td>
    <br>
    Quick drying towel (medium sized)
    <br>
    Soap (preferably biodegradable)
    <br>
    Tooth brush/paste (preferably biodegradable)
    <br>
    Deodorants
    <br>
    Face and body moisturizer
    <br>
    Nail clippers
    <br>
    Small mirror
    <br>
    Tissue paper/ toilet roll
    <br>
    Anti bacterial Hand wash
  </td>
</tr>

<tr>
  <td>Extras</td>
  <td>
    <br>
    Trail Map/Guide book
    <br>
    Binocular
    <br>
    Reading book
    <br>
    Journal & Pen
    <br>
    Pencils and small notebooks
    <br>
    Note: For more information regarding trekking equipment\'s check list, please contact us
  </td>
  </tr>
</table>', '<div class=\"row no-gutters popup-gallery\">
  <div class=\"col-lg-4 col-sm-6\">
    <a class=\"gallery-box\" href=\"<?php echo url_for(\'images/homepage_assets/gallery/fullsize/1.jpg\'); ?>\">
      <img class=\"img-fluid sr-image\" src=\"<?php echo url_for(\'images/homepage_assets/gallery/thumbnails/1.jpg\'); ?>\" alt=\"\">
      <div class=\"gallery-box-caption\">
        <div class=\"gallery-box-caption-content\">
          <div class=\"project-category text-faded\">
            Category
          </div>
          <div class=\"project-name\">
            Project Name
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class=\"col-lg-4 col-sm-6\">
    <a class=\"gallery-box\" href=\"<?php echo url_for(\'images/homepage_assets/gallery/fullsize/2.jpg\'); ?>\">
      <img class=\"img-fluid sr-image\" src=\"<?php echo url_for(\'images/homepage_assets/gallery/thumbnails/2.jpg\'); ?>\" alt=\"\">
      <div class=\"gallery-box-caption\">
        <div class=\"gallery-box-caption-content\">
          <div class=\"project-category text-faded\">
            Category
          </div>
          <div class=\"project-name\">
            Project Name
          </div>
        </div>
      </div>
    </a>
  </div>
  <div class=\"col-lg-4 col-sm-6\">
    <a class=\"gallery-box\" href=\"<?php echo url_for(\'images/homepage_assets/gallery/fullsize/3.jpg\'); ?>\">
      <img class=\"img-fluid sr-image\" src=\"<?php echo url_for(\'images/homepage_assets/gallery/thumbnails/3.jpg\'); ?>\" alt=\"\">
      <div class=\"gallery-box-caption\">
        <div class=\"gallery-box-caption-content\">
          <div class=\"project-category text-faded\">
            Category
          </div>
          <div class=\"project-name\">
            Project Name
          </div>
        </div>
      </div>
    </a>
  </div>
</div>');
