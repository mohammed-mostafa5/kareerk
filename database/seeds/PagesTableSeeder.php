<?php

use Illuminate\Database\Seeder;
use App\Models\Page;

class PagesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allData = [
            // Who we are Page.
            [
                // English Data
                'en' => ['name' => 'Who we are', 'content' => '<p>Welcome to Aleefak</p>

                <h3>We connect millions of buyers and sellers around the world, empowering people &amp; creating economic opportunity for all.</h3>

                <p>Within our markets, millions of people around the world connect, both online and offline, to make, sell and buy unique goods. We also offer a wide range of Seller Services and tools that help creative entrepreneurs start, manage and scale their businesses. Our mission is to reimagine commerce in ways that build a more fulfilling and lasting world, and we&rsquo;re committed to using the power of business to strengthen communities and empower people.</p>'],

                // Arabic Data
                'ar' => ['name' => 'من نحن', 'content' => '<p>مرحبًا بكم في Aleefak</p>

                <h3>نحن نربط الملايين من المشترين والبائعين في جميع أنحاء العالم ، ونمكن الناس وخلق الفرص الاقتصادية للجميع.</h3>

                <p>داخل أسواقنا ، يتصل ملايين الأشخاص حول العالم ، سواء عبر الإنترنت أو في وضع عدم الاتصال ، لصنع وبيع وشراء سلع فريدة. كما نقدم مجموعة واسعة من خدمات وأدوات البائع التي تساعد رواد الأعمال المبدعين على بدء أعمالهم وإدارتها وتوسيع نطاقها. مهمتنا هي إعادة تخيل التجارة بطرق تبني عالماً أكثر إشباعًا ودائمًا ، ونحن ملتزمون باستخدام قوة الأعمال لتعزيز المجتمعات وتمكين الناس.
                </p>

                <div id="gtx-trans" style="position: absolute; left: 49px; top: -6px;">
                <div class="gtx-trans-icon">&nbsp;</div>
                </div>'],

                // Options
                'in_navbar' => 'yes',
                'in_footer' => 'yes',

            ],
            // Home Page.
            [
                // English Data
                'en' => ['name' => 'home', 'content' => 'home'],

                // Arabic Data
                'ar' => ['name' => 'الرئيسية', 'content' => 'الرئيسية'],

                // Options
                'in_navbar' => 'yes',
                'in_footer' => 'yes',

            ],
            // Contact Page.
            [
                // English Data
                'en' => ['name' => 'contact', 'content' => 'contact'],

                // Arabic Data
                'ar' => ['name' => 'اتصل بنا', 'content' => 'اتصل بنا'],

                // Options
                'in_navbar' => 'yes',
                'in_footer' => 'yes',

            ],

            // How it works Page.
            [
                // English Data
                'en' => ['name' => 'How it works', 'content' => '<div class="table-responsive">
                <table class="table ps-table--faqs">
                    <tbody>
                        <tr>
                            <td class="heading" rowspan="3">
                                <h4>SHIPPING</h4>
                            </td>
                            <td class="question"> What Shipping Methods Are Available?</td>
                            <td>Ex Portland Pitchfork irure mustache. Eutra fap before they sold out literally. Aliquip ugh bicycle rights actually mlkshk, seitan squid craft beer tempor.</td>
                        </tr>
                        <tr>
                            <td class="question">Do You Ship Internationally?</td>
                            <td>Hoodie tote bag mixtape tofu. Typewriter jean shorts wolf quinoa, messenger bag organic freegan cray.</td>
                        </tr>
                        <tr>
                            <td class="question">How Long Will It Take To Get My Package?</td>
                            <td>Swag slow-carb quinoa VHS typewriter pork belly brunch, paleo single-origin coffee Wes Anderson. Flexitarian Pitchfork forage, literally paleo fap pour-over. Wes Anderson Pinterest YOLO fanny pack meggings, deep v XOXO
                                chambray sustainable slow-carb raw denim church-key fap chillwave Etsy. +1 typewriter kitsch, American Apparel tofu Banksy Vice.</td>
                        </tr>
                        <tr>
                            <td class="heading" rowspan="2">
                                <h4>PAYMENT</h4>
                            </td>
                            <td class="question"> What Payment Methods Are Accepted?</td>
                            <td>Fashion axe DIY jean shorts, swag kale chips meh polaroid kogi butcher Wes Anderson chambray next level semiotics gentrify yr. Voluptate photo booth fugiat Vice. Austin sed Williamsburg, ea labore raw denim voluptate
                                cred proident mixtape excepteur mustache. Twee chia photo booth readymade food truck, hoodie roof party swag keytar PBR DIY.</td>
                        </tr>
                        <tr>
                            <td class="question">Is Buying On-Line Safe?</td>
                            <td>Art party authentic freegan semiotics jean shorts chia cred. Neutra Austin roof party Brooklyn, synth Thundercats swag 8-bit photo booth. Plaid letterpress leggings craft beer meh ethical Pinterest.</td>
                        </tr>
                        <tr>
                            <td class="heading" rowspan="5">
                                <h4>Order &amp; Retunrs</h4>
                            </td>
                            <td class="question"> How do I place an Order?</td>
                            <td>Keytar cray slow-carb, Godard banh mi salvia pour-over. Slow-carb Odd Future seitan normcore. Master cleanse American Apparel gentrify flexitarian beard slow-carb next level. Raw denim polaroid paleo farm-to-table,
                                put a bird on it lo-fi tattooed Wes Anderson Pinterest letterpress. Fingerstache McSweeney’s pour-over, letterpress Schlitz photo booth master cleanse bespoke hashtag chillwave gentrify.</td>
                        </tr>
                        <tr>
                            <td class="question">How Can I Cancel Or Change My Order?</td>
                            <td>Plaid letterpress leggings craft beer meh ethical Pinterest. Art party authentic freegan semiotics jean shorts chia cred. Neutra Austin roof party Brooklyn, synth Thundercats swag 8-bit photo booth.</td>
                        </tr>
                        <tr>
                            <td class="question">Do I need an account to place an order?</td>
                            <td>Thundercats swag 8-bit photo booth. Plaid letterpress leggings craft beer meh ethical Pinterest. Twee chia photo booth readymade food truck, hoodie roof party swag keytar PBR DIY. Cray ugh 3 wolf moon fap, fashion axe
                                irony butcher cornhole typewriter chambray VHS banjo street art.</td>
                        </tr>
                        <tr>
                            <td class="question">How Do I Track My Order?</td>
                            <td>Kale chips Truffaut Williamsburg, hashtag fixie Pinterest raw denim c hambray drinking vinegar Carles street art Bushwick gastropub. Wolf Tumblr paleo church-key. Plaid food truck Echo Park YOLO bitters hella, direct
                                trade Thundercats leggings quinoa before they sold out. You probably haven’t heard of them wayfarers authentic umami drinking vinegar Pinterest Cosby sweater, fingerstache fap High Life.</td>
                        </tr>
                    </tbody>
                </table>
            </div>'],

                // Arabic Data
                'ar' => ['name' => 'كيف تعمل', 'content' => '<div class="table-responsive">
                <table class="table ps-table--faqs">
                    <tbody>
                        <tr>
                            <td class="heading" rowspan="3">
                                <h4>الشحن</h4>
                            </td>
                            <td class="question">ما هي طرق الشحن المتوفرة؟</td>
                            <td>سابق بورتلاند بيتشفورك شارب الغضب. Eutra fap قبل أن يباع حرفيا. Aliquip لاف حقوق الدراجات فعلا mlkshk ، seitan الحبار الحرف البيرة مؤقت.</td>
                        </tr>
                        <tr>
                            <td class="question">هل تشحن دوليًا؟</td>
                            <td>هوديي حمل حقيبة mixtape التوفو. الآلة الكاتبة جان شورت الذئب الكينوا ، حقيبة رسول العضوية كراي فريغان.</td>
                        </tr>
                        <tr>
                            <td class="question">كم من الوقت سيستغرق الحصول على الطرد الخاص بي؟</td>
                            <td>Swag بطيء الكربوهيدرات الكينوا VHS الآلة الكاتبة غداء بطن لحم الخنزير ، قهوة أحادية الأصل باليو ويس أندرسون. العلف المرن Pitchfork ، حرفيا باليو بالصب أكثر. Wes Anderson Pinterest YOLO fanny pack meggings ، عميق v XOXO شامبراي مستدام بطيء الكربوهيدرات الدنيم الخام - مفتاح الكنيسة fap chillwave Etsy. مجموعة أدوات الآلة الكاتبة +1 ، American Apparel tofu Banksy Vice.
                            </td>
                        </tr>
                        <tr>
                            <td class="heading" rowspan="2">
                                <h4>PAYMENT</h4>
                            </td>
                            <td class="question">ما هي طرق الدفع المقبولة؟</td>
                            <td>أزياء الفأس DIY جان السراويل ، ورقائق غنيمة اللفت meh بولارويد كوجي جزار ويس أندرسون شامبراي المستوى التالي السيميائية gentrify سنة. Voluptate كشك الصور fugiat نائب. أوستن سيد ويليامزبرغ ، الدنيم الخام الدنيم الخام المجهول الموسيقي باستثناء الشارب. Twee chia photo booth الجاهزة شاحنة الغذاء ، هوديي سقف حزب غنيمة keytar PBR DIY.</td>
                        </tr>
                        <tr>
                            <td class="question">هل الشراء عبر الإنترنت آمن؟
                            </td>
                            <td>الفن حزب أصيلة freegan السيميائية جان السراويل شيا الائتمان. Neutra Austin سقف حفلة بروكلين ، موالفة Thundercats يتأرجح كشك الصور 8 بت. منقوشة طماق الحروف الحرفية البيرة ميه Pinterest الأخلاقية.
                            </td>
                        </tr>
                        <tr>
                            <td class="heading" rowspan="5">
                                <h4>الطلب والاسترجاع</h4>
                            </td>
                            <td class="question"> كيف يمكنني وضع النظام؟
                            </td>
                            <td>Keytar كراي بطيء الكربوهيدرات ، جودارد بانه مي سالفيا صب. Slow-carb Odd Future seitan normcore. تطهير سيد الملابس الأمريكية تحسين اللحية المرنة بطيئة الكربوهيدرات المستوى التالي. الدنيم الخام بولارويد باليو من المزرعة إلى الطاولة ، وضع طائرًا عليه وشمًا صغيرًا Wes Anderson Pinterest letterpress. تدفقت Fingerstache McSweeney ، والطباعة على الحروف في Schlitz كشك الصور الرئيسي المفصل حسب علامة التجزئة chillwave gentrify.
                            </td>
                        </tr>
                        <tr>
                            <td class="question">كيف يمكنني إلغاء أو تغيير طلبي؟
                            </td>
                            <td>منقوشة طماق الحروف الحرفية البيرة ميه Pinterest الأخلاقية. الفن حزب أصيلة freegan السيميائية جان السراويل شيا الائتمان. Neutra Austin سقف حفلة بروكلين ، موالفة Thundercats يتأرجح كشك الصور 8 بت.
                            </td>
                        </tr>
                        <tr>
                            <td class="question">هل أحتاج إلى حساب لتقديم طلب؟</td>
                            <td>Thundercats يتمايل كشك الصور 8 بت. منقوشة طماق الحروف الحرفية البيرة ميه Pinterest الأخلاقية. Twee chia photo booth الجاهزة شاحنة الغذاء ، هوديي سقف حزب غنيمة keytar PBR DIY. Cray ugh 3 الذئب القمر الذئب ، أزياء الفأس السخرية الجزار آلة كاتبة شامبراي VHS بانجو فن الشارع.
                            </td>
                        </tr>
                        <tr>
                            <td class="question">كيف أتتبع طلبي؟
                            </td>
                            <td>Kale chips Truffaut Williamsburg، hashtag fixie Pinterest raw denim c hambray شرب الخل Carles street art Bushwick gastropub. الذئب نعرفكم باليو مفتاح الكنيسة. شاحنة طعام منقوشة Echo Park YOLO تشعرك بالمرارة هيلا ، وتجارة ثيندكاتس طماق الكينوا للتجارة المباشرة قبل بيعها. ربما لم تكن قد سمعت عنهم عابري السبيل الحقيقيين الذين يشربون الخل Pinterest Cosby sweater ، fingerstache fap High Life.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>'],

                // Options
                'in_navbar' => 'yes',
                'in_footer' => 'yes',

            ],
            // Terms and conditions.
            [
                // English Data
                'en' => ['name' => 'Terms and conditions', 'content' => '<div class="table-responsive">
                <table class="table ps-table--faqs">
                    <tbody>
                        <tr>
                            <td class="heading" rowspan="3">
                                <h4>SHIPPING</h4>
                            </td>
                            <td class="question"> What Shipping Methods Are Available?</td>
                            <td>Ex Portland Pitchfork irure mustache. Eutra fap before they sold out literally. Aliquip ugh bicycle rights actually mlkshk, seitan squid craft beer tempor.</td>
                        </tr>
                        <tr>
                            <td class="question">Do You Ship Internationally?</td>
                            <td>Hoodie tote bag mixtape tofu. Typewriter jean shorts wolf quinoa, messenger bag organic freegan cray.</td>
                        </tr>
                        <tr>
                            <td class="question">How Long Will It Take To Get My Package?</td>
                            <td>Swag slow-carb quinoa VHS typewriter pork belly brunch, paleo single-origin coffee Wes Anderson. Flexitarian Pitchfork forage, literally paleo fap pour-over. Wes Anderson Pinterest YOLO fanny pack meggings, deep v XOXO
                                chambray sustainable slow-carb raw denim church-key fap chillwave Etsy. +1 typewriter kitsch, American Apparel tofu Banksy Vice.</td>
                        </tr>
                        <tr>
                            <td class="heading" rowspan="2">
                                <h4>PAYMENT</h4>
                            </td>
                            <td class="question"> What Payment Methods Are Accepted?</td>
                            <td>Fashion axe DIY jean shorts, swag kale chips meh polaroid kogi butcher Wes Anderson chambray next level semiotics gentrify yr. Voluptate photo booth fugiat Vice. Austin sed Williamsburg, ea labore raw denim voluptate
                                cred proident mixtape excepteur mustache. Twee chia photo booth readymade food truck, hoodie roof party swag keytar PBR DIY.</td>
                        </tr>
                        <tr>
                            <td class="question">Is Buying On-Line Safe?</td>
                            <td>Art party authentic freegan semiotics jean shorts chia cred. Neutra Austin roof party Brooklyn, synth Thundercats swag 8-bit photo booth. Plaid letterpress leggings craft beer meh ethical Pinterest.</td>
                        </tr>
                        <tr>
                            <td class="heading" rowspan="5">
                                <h4>Order &amp; Retunrs</h4>
                            </td>
                            <td class="question"> How do I place an Order?</td>
                            <td>Keytar cray slow-carb, Godard banh mi salvia pour-over. Slow-carb Odd Future seitan normcore. Master cleanse American Apparel gentrify flexitarian beard slow-carb next level. Raw denim polaroid paleo farm-to-table,
                                put a bird on it lo-fi tattooed Wes Anderson Pinterest letterpress. Fingerstache McSweeney’s pour-over, letterpress Schlitz photo booth master cleanse bespoke hashtag chillwave gentrify.</td>
                        </tr>
                        <tr>
                            <td class="question">How Can I Cancel Or Change My Order?</td>
                            <td>Plaid letterpress leggings craft beer meh ethical Pinterest. Art party authentic freegan semiotics jean shorts chia cred. Neutra Austin roof party Brooklyn, synth Thundercats swag 8-bit photo booth.</td>
                        </tr>
                        <tr>
                            <td class="question">Do I need an account to place an order?</td>
                            <td>Thundercats swag 8-bit photo booth. Plaid letterpress leggings craft beer meh ethical Pinterest. Twee chia photo booth readymade food truck, hoodie roof party swag keytar PBR DIY. Cray ugh 3 wolf moon fap, fashion axe
                                irony butcher cornhole typewriter chambray VHS banjo street art.</td>
                        </tr>
                        <tr>
                            <td class="question">How Do I Track My Order?</td>
                            <td>Kale chips Truffaut Williamsburg, hashtag fixie Pinterest raw denim c hambray drinking vinegar Carles street art Bushwick gastropub. Wolf Tumblr paleo church-key. Plaid food truck Echo Park YOLO bitters hella, direct
                                trade Thundercats leggings quinoa before they sold out. You probably haven’t heard of them wayfarers authentic umami drinking vinegar Pinterest Cosby sweater, fingerstache fap High Life.</td>
                        </tr>
                    </tbody>
                </table>
            </div>'],

                // Arabic Data
                'ar' => ['name' => 'الشروط والاحكام', 'content' => '<div class="table-responsive">
                <table class="table ps-table--faqs">
                    <tbody>
                        <tr>
                            <td class="heading" rowspan="3">
                                <h4>الشحن</h4>
                            </td>
                            <td class="question">ما هي طرق الشحن المتوفرة؟</td>
                            <td>سابق بورتلاند بيتشفورك شارب الغضب. Eutra fap قبل أن يباع حرفيا. Aliquip لاف حقوق الدراجات فعلا mlkshk ، seitan الحبار الحرف البيرة مؤقت.</td>
                        </tr>
                        <tr>
                            <td class="question">هل تشحن دوليًا؟</td>
                            <td>هوديي حمل حقيبة mixtape التوفو. الآلة الكاتبة جان شورت الذئب الكينوا ، حقيبة رسول العضوية كراي فريغان.</td>
                        </tr>
                        <tr>
                            <td class="question">كم من الوقت سيستغرق الحصول على الطرد الخاص بي؟</td>
                            <td>Swag بطيء الكربوهيدرات الكينوا VHS الآلة الكاتبة غداء بطن لحم الخنزير ، قهوة أحادية الأصل باليو ويس أندرسون. العلف المرن Pitchfork ، حرفيا باليو بالصب أكثر. Wes Anderson Pinterest YOLO fanny pack meggings ، عميق v XOXO شامبراي مستدام بطيء الكربوهيدرات الدنيم الخام - مفتاح الكنيسة fap chillwave Etsy. مجموعة أدوات الآلة الكاتبة +1 ، American Apparel tofu Banksy Vice.
                            </td>
                        </tr>
                        <tr>
                            <td class="heading" rowspan="2">
                                <h4>PAYMENT</h4>
                            </td>
                            <td class="question">ما هي طرق الدفع المقبولة؟</td>
                            <td>أزياء الفأس DIY جان السراويل ، ورقائق غنيمة اللفت meh بولارويد كوجي جزار ويس أندرسون شامبراي المستوى التالي السيميائية gentrify سنة. Voluptate كشك الصور fugiat نائب. أوستن سيد ويليامزبرغ ، الدنيم الخام الدنيم الخام المجهول الموسيقي باستثناء الشارب. Twee chia photo booth الجاهزة شاحنة الغذاء ، هوديي سقف حزب غنيمة keytar PBR DIY.</td>
                        </tr>
                        <tr>
                            <td class="question">هل الشراء عبر الإنترنت آمن؟
                            </td>
                            <td>الفن حزب أصيلة freegan السيميائية جان السراويل شيا الائتمان. Neutra Austin سقف حفلة بروكلين ، موالفة Thundercats يتأرجح كشك الصور 8 بت. منقوشة طماق الحروف الحرفية البيرة ميه Pinterest الأخلاقية.
                            </td>
                        </tr>
                        <tr>
                            <td class="heading" rowspan="5">
                                <h4>الطلب والاسترجاع</h4>
                            </td>
                            <td class="question"> كيف يمكنني وضع النظام؟
                            </td>
                            <td>Keytar كراي بطيء الكربوهيدرات ، جودارد بانه مي سالفيا صب. Slow-carb Odd Future seitan normcore. تطهير سيد الملابس الأمريكية تحسين اللحية المرنة بطيئة الكربوهيدرات المستوى التالي. الدنيم الخام بولارويد باليو من المزرعة إلى الطاولة ، وضع طائرًا عليه وشمًا صغيرًا Wes Anderson Pinterest letterpress. تدفقت Fingerstache McSweeney ، والطباعة على الحروف في Schlitz كشك الصور الرئيسي المفصل حسب علامة التجزئة chillwave gentrify.
                            </td>
                        </tr>
                        <tr>
                            <td class="question">كيف يمكنني إلغاء أو تغيير طلبي؟
                            </td>
                            <td>منقوشة طماق الحروف الحرفية البيرة ميه Pinterest الأخلاقية. الفن حزب أصيلة freegan السيميائية جان السراويل شيا الائتمان. Neutra Austin سقف حفلة بروكلين ، موالفة Thundercats يتأرجح كشك الصور 8 بت.
                            </td>
                        </tr>
                        <tr>
                            <td class="question">هل أحتاج إلى حساب لتقديم طلب؟</td>
                            <td>Thundercats يتمايل كشك الصور 8 بت. منقوشة طماق الحروف الحرفية البيرة ميه Pinterest الأخلاقية. Twee chia photo booth الجاهزة شاحنة الغذاء ، هوديي سقف حزب غنيمة keytar PBR DIY. Cray ugh 3 الذئب القمر الذئب ، أزياء الفأس السخرية الجزار آلة كاتبة شامبراي VHS بانجو فن الشارع.
                            </td>
                        </tr>
                        <tr>
                            <td class="question">كيف أتتبع طلبي؟
                            </td>
                            <td>Kale chips Truffaut Williamsburg، hashtag fixie Pinterest raw denim c hambray شرب الخل Carles street art Bushwick gastropub. الذئب نعرفكم باليو مفتاح الكنيسة. شاحنة طعام منقوشة Echo Park YOLO تشعرك بالمرارة هيلا ، وتجارة ثيندكاتس طماق الكينوا للتجارة المباشرة قبل بيعها. ربما لم تكن قد سمعت عنهم عابري السبيل الحقيقيين الذين يشربون الخل Pinterest Cosby sweater ، fingerstache fap High Life.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>'],

                // Options
                'in_navbar' => 'yes',
                'in_footer' => 'yes',

            ],
            // Privacy Policy.
            [
                // English Data
                'en' => ['name' => 'Privacy Policy', 'content' => '<div class="table-responsive">
                <table class="table ps-table--faqs">
                    <tbody>
                        <tr>
                            <td class="heading" rowspan="3">
                                <h4>SHIPPING</h4>
                            </td>
                            <td class="question"> What Shipping Methods Are Available?</td>
                            <td>Ex Portland Pitchfork irure mustache. Eutra fap before they sold out literally. Aliquip ugh bicycle rights actually mlkshk, seitan squid craft beer tempor.</td>
                        </tr>
                        <tr>
                            <td class="question">Do You Ship Internationally?</td>
                            <td>Hoodie tote bag mixtape tofu. Typewriter jean shorts wolf quinoa, messenger bag organic freegan cray.</td>
                        </tr>
                        <tr>
                            <td class="question">How Long Will It Take To Get My Package?</td>
                            <td>Swag slow-carb quinoa VHS typewriter pork belly brunch, paleo single-origin coffee Wes Anderson. Flexitarian Pitchfork forage, literally paleo fap pour-over. Wes Anderson Pinterest YOLO fanny pack meggings, deep v XOXO
                                chambray sustainable slow-carb raw denim church-key fap chillwave Etsy. +1 typewriter kitsch, American Apparel tofu Banksy Vice.</td>
                        </tr>
                        <tr>
                            <td class="heading" rowspan="2">
                                <h4>PAYMENT</h4>
                            </td>
                            <td class="question"> What Payment Methods Are Accepted?</td>
                            <td>Fashion axe DIY jean shorts, swag kale chips meh polaroid kogi butcher Wes Anderson chambray next level semiotics gentrify yr. Voluptate photo booth fugiat Vice. Austin sed Williamsburg, ea labore raw denim voluptate
                                cred proident mixtape excepteur mustache. Twee chia photo booth readymade food truck, hoodie roof party swag keytar PBR DIY.</td>
                        </tr>
                        <tr>
                            <td class="question">Is Buying On-Line Safe?</td>
                            <td>Art party authentic freegan semiotics jean shorts chia cred. Neutra Austin roof party Brooklyn, synth Thundercats swag 8-bit photo booth. Plaid letterpress leggings craft beer meh ethical Pinterest.</td>
                        </tr>
                        <tr>
                            <td class="heading" rowspan="5">
                                <h4>Order &amp; Retunrs</h4>
                            </td>
                            <td class="question"> How do I place an Order?</td>
                            <td>Keytar cray slow-carb, Godard banh mi salvia pour-over. Slow-carb Odd Future seitan normcore. Master cleanse American Apparel gentrify flexitarian beard slow-carb next level. Raw denim polaroid paleo farm-to-table,
                                put a bird on it lo-fi tattooed Wes Anderson Pinterest letterpress. Fingerstache McSweeney’s pour-over, letterpress Schlitz photo booth master cleanse bespoke hashtag chillwave gentrify.</td>
                        </tr>
                        <tr>
                            <td class="question">How Can I Cancel Or Change My Order?</td>
                            <td>Plaid letterpress leggings craft beer meh ethical Pinterest. Art party authentic freegan semiotics jean shorts chia cred. Neutra Austin roof party Brooklyn, synth Thundercats swag 8-bit photo booth.</td>
                        </tr>
                        <tr>
                            <td class="question">Do I need an account to place an order?</td>
                            <td>Thundercats swag 8-bit photo booth. Plaid letterpress leggings craft beer meh ethical Pinterest. Twee chia photo booth readymade food truck, hoodie roof party swag keytar PBR DIY. Cray ugh 3 wolf moon fap, fashion axe
                                irony butcher cornhole typewriter chambray VHS banjo street art.</td>
                        </tr>
                        <tr>
                            <td class="question">How Do I Track My Order?</td>
                            <td>Kale chips Truffaut Williamsburg, hashtag fixie Pinterest raw denim c hambray drinking vinegar Carles street art Bushwick gastropub. Wolf Tumblr paleo church-key. Plaid food truck Echo Park YOLO bitters hella, direct
                                trade Thundercats leggings quinoa before they sold out. You probably haven’t heard of them wayfarers authentic umami drinking vinegar Pinterest Cosby sweater, fingerstache fap High Life.</td>
                        </tr>
                    </tbody>
                </table>
            </div>'],

                // Arabic Data
                'ar' => ['name' => 'سياسة الخصوصية', 'content' => '<div class="table-responsive">
                <table class="table ps-table--faqs">
                    <tbody>
                        <tr>
                            <td class="heading" rowspan="3">
                                <h4>الشحن</h4>
                            </td>
                            <td class="question">ما هي طرق الشحن المتوفرة؟</td>
                            <td>سابق بورتلاند بيتشفورك شارب الغضب. Eutra fap قبل أن يباع حرفيا. Aliquip لاف حقوق الدراجات فعلا mlkshk ، seitan الحبار الحرف البيرة مؤقت.</td>
                        </tr>
                        <tr>
                            <td class="question">هل تشحن دوليًا؟</td>
                            <td>هوديي حمل حقيبة mixtape التوفو. الآلة الكاتبة جان شورت الذئب الكينوا ، حقيبة رسول العضوية كراي فريغان.</td>
                        </tr>
                        <tr>
                            <td class="question">كم من الوقت سيستغرق الحصول على الطرد الخاص بي؟</td>
                            <td>Swag بطيء الكربوهيدرات الكينوا VHS الآلة الكاتبة غداء بطن لحم الخنزير ، قهوة أحادية الأصل باليو ويس أندرسون. العلف المرن Pitchfork ، حرفيا باليو بالصب أكثر. Wes Anderson Pinterest YOLO fanny pack meggings ، عميق v XOXO شامبراي مستدام بطيء الكربوهيدرات الدنيم الخام - مفتاح الكنيسة fap chillwave Etsy. مجموعة أدوات الآلة الكاتبة +1 ، American Apparel tofu Banksy Vice.
                            </td>
                        </tr>
                        <tr>
                            <td class="heading" rowspan="2">
                                <h4>PAYMENT</h4>
                            </td>
                            <td class="question">ما هي طرق الدفع المقبولة؟</td>
                            <td>أزياء الفأس DIY جان السراويل ، ورقائق غنيمة اللفت meh بولارويد كوجي جزار ويس أندرسون شامبراي المستوى التالي السيميائية gentrify سنة. Voluptate كشك الصور fugiat نائب. أوستن سيد ويليامزبرغ ، الدنيم الخام الدنيم الخام المجهول الموسيقي باستثناء الشارب. Twee chia photo booth الجاهزة شاحنة الغذاء ، هوديي سقف حزب غنيمة keytar PBR DIY.</td>
                        </tr>
                        <tr>
                            <td class="question">هل الشراء عبر الإنترنت آمن؟
                            </td>
                            <td>الفن حزب أصيلة freegan السيميائية جان السراويل شيا الائتمان. Neutra Austin سقف حفلة بروكلين ، موالفة Thundercats يتأرجح كشك الصور 8 بت. منقوشة طماق الحروف الحرفية البيرة ميه Pinterest الأخلاقية.
                            </td>
                        </tr>
                        <tr>
                            <td class="heading" rowspan="5">
                                <h4>الطلب والاسترجاع</h4>
                            </td>
                            <td class="question"> كيف يمكنني وضع النظام؟
                            </td>
                            <td>Keytar كراي بطيء الكربوهيدرات ، جودارد بانه مي سالفيا صب. Slow-carb Odd Future seitan normcore. تطهير سيد الملابس الأمريكية تحسين اللحية المرنة بطيئة الكربوهيدرات المستوى التالي. الدنيم الخام بولارويد باليو من المزرعة إلى الطاولة ، وضع طائرًا عليه وشمًا صغيرًا Wes Anderson Pinterest letterpress. تدفقت Fingerstache McSweeney ، والطباعة على الحروف في Schlitz كشك الصور الرئيسي المفصل حسب علامة التجزئة chillwave gentrify.
                            </td>
                        </tr>
                        <tr>
                            <td class="question">كيف يمكنني إلغاء أو تغيير طلبي؟
                            </td>
                            <td>منقوشة طماق الحروف الحرفية البيرة ميه Pinterest الأخلاقية. الفن حزب أصيلة freegan السيميائية جان السراويل شيا الائتمان. Neutra Austin سقف حفلة بروكلين ، موالفة Thundercats يتأرجح كشك الصور 8 بت.
                            </td>
                        </tr>
                        <tr>
                            <td class="question">هل أحتاج إلى حساب لتقديم طلب؟</td>
                            <td>Thundercats يتمايل كشك الصور 8 بت. منقوشة طماق الحروف الحرفية البيرة ميه Pinterest الأخلاقية. Twee chia photo booth الجاهزة شاحنة الغذاء ، هوديي سقف حزب غنيمة keytar PBR DIY. Cray ugh 3 الذئب القمر الذئب ، أزياء الفأس السخرية الجزار آلة كاتبة شامبراي VHS بانجو فن الشارع.
                            </td>
                        </tr>
                        <tr>
                            <td class="question">كيف أتتبع طلبي؟
                            </td>
                            <td>Kale chips Truffaut Williamsburg، hashtag fixie Pinterest raw denim c hambray شرب الخل Carles street art Bushwick gastropub. الذئب نعرفكم باليو مفتاح الكنيسة. شاحنة طعام منقوشة Echo Park YOLO تشعرك بالمرارة هيلا ، وتجارة ثيندكاتس طماق الكينوا للتجارة المباشرة قبل بيعها. ربما لم تكن قد سمعت عنهم عابري السبيل الحقيقيين الذين يشربون الخل Pinterest Cosby sweater ، fingerstache fap High Life.
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>'],

                // Options
                'in_navbar' => 'yes',
                'in_footer' => 'yes',

            ],
        ];

        foreach ($allData as $data) {
            Page::create($data);
        }
    }
}
