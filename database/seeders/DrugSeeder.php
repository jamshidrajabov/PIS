<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DrugSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('drugs')->insert([
            [
                'name' => 'Asetilsalisilovaya kislota (Aspirin)',
                'description' =>' <b>Asetilsalisilovaya kislota (Aspirin) (Acetylsalicylic acid) qo\'lanishi bo\'yicha ko\'rsatmalar</b>
                <b>QO‘LLASH BO‘YICHA YO‘RIQNOMA</b>
                <b>Preparatning savdo nomi:</b>
                <p>Asetilsalisil kislotasi</p>
                <b class="col-md-12">Ta‘sir etuvchi modda (XPN):</b>
                <p>asetilsalisil kislotasi</p>
                <b>Dori shakli:</b>
                <p>tabletka</p>
                <b>1 tabletka quyidagilarni saqlaydi:</b>
                <p>faol modda: asetilsalisil kislotasi – 0,25 g yoki 0,5 g; </p>
                <p>yordamchi moddalar: kartoshka kraxmali, kalsiy stearati yoki stearin kislotasi yoki magniy stearati.</p>
                <b>Ta‘rifi:</b>
                <p>oq rangli, biroz nordonroq ta‘mli tabletkalar.</p>
                <b>Farmakoterapevtik guruhi:</b>
                <p>nosteroid yallig‘lanishga qarshi vositalar.</p>
                <b>ATX kodi:</b>
                <p>N02BA01</p>
                <b>Farmakologik xususiyatlari</b>
                <p>Preparat og‘riqni qoldiruvchi, isitmani tushiruvchi, yallig‘lanishga qarshi ta‘sir ko‘rsatadi, bu prostaglandinlarning sintezida ishtirok qiluvchi 1 va 2 siklooksigenazalarni ingibisiya qilinishi bilan bog‘liq. Asetilsalisil kislotasi tromboksan A2 ning sintezini bloklab, trombositlar agregasiyasini ingibisiya qiladi.</p>
                <b>Farmakokinetikasi</b>
                <p>Ichga qabul qilinganida to‘liq so‘riladi. So‘rilish vaqtida ichak devorida va jigarda tizimli eliminasiyaga uchraydi (deasetillanadi). Rezorbsiyalangan qismi maxsus esterazalar tomonidan tez gidrolizlanadi, shuning uchun yarim chiqarilish davri – 15-20 minutdan ko‘p emas.</p>
                <p>Organizmda aylanib yuradi (75-90% albumin bilan bog‘langan holda) va to‘qimalarda salisil kislotasining anioni sifatida taqsimlanadi.</p>
                <p>Maksimal konsentrasiyaga erishish uchun kerak bo‘lgan vaqt – 2 soat.</p>
                <p>Salisilatlarning zardobdagi darajasi ancha o‘zgarib turadi. Salisilatlar organizmning ko‘pchilik to‘qimalari va suyuqliklariga, shu jumladan orqa miya, peritoneal va sinovial suyuqliklariga yengil kiradi. Bo‘g‘imlarning bo‘shlig‘iga kirishi giperemiya va shish bo‘lganida tezlashadi va yallig‘lanishning proliferativ bosqichida sekinlashadi. Salisilatlar katta bo‘lmagan miqdorlarda bosh miya to‘qimasida, izlari – safroda, terda, axlatda aniqlanadi. Asidoz paydo bo‘lganida salisil kislotasining katta qismi to‘qimalarga, shu jumladan bosh miyaga yaxshi kiruvchi ionlanmagan kislotaga aylanadi. Yo‘ldosh to‘sig‘i orqali tez o‘tadi, ko‘p bo‘lmagan miqdorlarda ko‘krak suti bilan chiqariladi.</p>
                <p>Asosan jigarda, ko‘pchilik to‘qimalarda va siydikda aniqlanuvchi 4 metabolitlarining hosil bo‘lishi bilan metabolizmga uchraydi.</p>
                <p>Asosan buyrak naychalarida faol sekresiya yo‘li bilan o‘zgarmagan holda (60%) va metabolitlari ko‘rinishida chiqariladi. O‘zgarmagan salisilatning chiqarilishi siydikning rN ga bog‘liq (siydik ishqoriylashganida salisilatlarning ionlanishi oshadi, ularning reabsorbsiyasi yomonlashadi va chiqarilishi sezilarli darajada oshadi). Chiqarilish tezligi dozaga bog‘liq: katta bo‘lmagan dozalar qabul qilinganida yarim chiqarilish davri – 2-3 soat, doza ko‘payishi bilan 15-30 soatlargacha oshishi mumkin.</p>
                <b>Qo‘llanilishi</b>
                <p>O‘rtacha yoki kuchsiz ifodalangan og‘riq sindromini simptomatik davolash: bosh og‘rig‘i (shu jumladan abstinent sindromidagi), tish og‘rig‘i, beldagi va mushaklardagi og‘riqlar, bo‘g‘imlardagi og‘riqlar, xayz ko‘rishdagi og‘riqlarda qo‘llaniladi.</p>
                <p>«Shamollash» va boshqa infeksion-yallig‘lanish kasalliklaridagi tana haroratini oshishi (kattalar va 15 yoshdan oshgan bolalarda) da qo‘llaniladi.</p>
                <b>Qo‘llash usuli va dozalari</b>
                <p>Ichga ovqatdan keyin, suv, sut yoki ishqoriy mineral suv bilan birga qabul qilinadi.</p>
                <p>Kattalar va 15 yoshdan oshgan bolalar: bir martalik doza 0,25-0,5 g ni, kattalar uchun maksimal bir martalik doza 1,0 g (0,5 g dan 2 ta tabletka), maksimal sutkalik doza 3,0 g ni (0,5 g dan 6 tabletka) tashkil qiladi, zarurati bo‘lganda bir martalik dozani 4 soatdan kam bo‘lmagan interval bilan sutkada 3-4 marta qabul qilish mumkin.</p>
                <p>Bolalarga 6 yoshdan boshlab, virusli infeksiyalar chaqirgan o‘tkir respirator kasalliklardan tashqari, Rey sindromining (ensefalopatiya va o‘tkir jigar yetishmovchilining rivojlanishi bilan jigarning o‘tkir yog‘li distrofiyasi) rivojlanishining havfi tufayli, bir qabulga bir martalik doza 0,25 mg ni (0,5 g li ½ tabletka) tashkil qiladi, maksimal sutkalik doza – sutkada 1,5 g dan ko‘p emas.</p>
                <p>Davolash davomiyligi (shifokor bilan maslahatlashmasdan) og‘riqni qoldiruvchi vosita sifatida buyurilganida 5 kundan va isitmani tushiruvchi vosita sifatida buyurilganida 3 kundan oshmasligi kerak.</p>
                <b>Nojo‘ya ta‘sirlari</b>
                <p>Markaziy nerv tizimi tomonidan: bosh aylanishi, bosh og‘rig‘i, ko‘rishni buzilishi, eshitish o‘tkirligini pasayishi, quloqlarda shovqin, aseptik meningit.</p>
                <p>Me‘da-ichak yo‘llari tomonidan: ko‘ngil aynishi, ishtahani pasayishi, gastralgiya, diareya, me‘da-ichak yo‘llarining eroziv-yarali shikastlanishi, me‘da-ichak yo‘llaridan qon ketishi.</p>
                <p>Buyrak tomonidan: buyrak funksiyasini buzilishi; interstisial nefrit, qonda kreatinin miqdorini oshishi va giperkalsemiya bilan prerenal azotemiya, papillyar nekroz, o‘tkir buyrak yetishmovchiligi, nefrotik sindrom, shishlar.</p>
                <p>Jigar tomonidan: jigar funksiyasini buzilishi, Rey sindromi (ensefalopatiya, jigar yetishmovchiligi tez rivojlanishi bilan jigarning o‘tkir yog‘li distrofiyasi), «jigar» transaminazalarining faolligini oshishi.</p>
                <p>Qon yaratish tizimi tomonidan: trombositopeniya, anemiya, leykopeniya, gipokoagulyasiya.
            
                    Yurak-qon tomir tizimi tomonidan: surunkali yurak yetishmovchiligining simptomlarini kuchayishi.
                    
                    Allergik reaksiyalar: teri toshmasi, angionevrotik shish, bronxospazm.
                    
                    Bunday simptomlar paydo bo‘lganida preparatni qabul qilishni to‘xtatish va darhol shifokorga murojaat qilish tavsiya etiladi.</p>
                <b>Qo‘llash mumkin bo‘lmagan holatlar</b>
                <p>– me‘da-ichak yo‘llarining (zo‘rayish bosqichidagi) eroziv-yarali shikastlanishlari;</p>
                <p>– me‘da-ichak qon ketishlari;</p>
                <p>– gemorragik diatez;</p>
                <p>– asetilsalisil kislotasiga, boshqa salisilatlarga yoki preparatning har qanday yordamchi moddalariga yuqori sezuvchanlik;</p>
                <p>– salisilatlar va nosteroid yallig‘lanishga qarshi preparatlarni qabul qilish induksiyalangan bronxial astma;</p>
                <p>– haftada va undan ko‘proq 15 mg doza metotreksat bilan birga qo‘llash;</p>
                <p>– homiladorlikning I va III uch oyligi va emizish davri;</p>
                <p>– bronxial astma, burun va burunoldi bo‘shliqlarining qaytalanuvchi polipozi va asetilsalisil kislotasini o‘zlashtiraolmaslikni to‘liq yoki to‘liq bo‘lmagan qo‘shilishi;</p>
                <p>– 6 yoshgacha bo‘lgan bolalar (ushbu dori shakli uchun) da qo‘llash mumkin emas.</p>
                <p>Preparat Rey sindromining (ensefalopatiya va o‘tkir jigar yetishmovchiligining rivojlanishi bilan jigarning o‘tkir yog‘li distrofiyasi) rivojlanishini xavfi tufayli, virusli infeksiyalar chaqirgan o‘tkir respirator kasalliklari bo‘lgan 15 yoshgacha bo‘lgan bolalarga buyurilmaydi.</p>
                <b>Extiyotkorlik bilan:</b>
                <p>– antikoagulyantlar bilan yondosh davolashda, podagrada, me‘da va/yoki o‘n ikki barmoqli ichakning yara kasalligi (anamnezdagi), jumladan yara kasalligini surunkali yoki qaytalanuvchi kechishini, yoki me‘da-ichak qon ketishlarining epizodlari;</p>
                <p>– buyrak va/yoki jigar yetishmovchiligida, glyukoza-6-fosfatdegidrogenazaning tanqisligida;</p>
                <p>– giperurikemiyada, bronxial astmada, o‘pkalarning surunkali obstruktiv kasalligida, pichan isitmasida, burun polipozida, doriga oid allergiyada, xaftada 15 mg dan kamroq dozada metotreksat bilan birga qabul qilishda, homiladorlikda (II uch oyligi) ehtiyotkorlikka rioya qilish kerak.</p>
                <b>Dorilarning o‘zaro ta‘siri</b>
                <p>Mumkin bo‘lmagan o‘zaro ta‘sirlar:
            
                    Haftada 15 mg dan yuqori dozada metotreksat qabul qilinganda: umuman nosteroid yallig‘lanishga qarshi preparatlar metotreksatning buyrak klirensini pasaytiradi, xususan salisilatlar esa, uni plazma oqsillari bilan bog‘idan siqib chiqaradilar, buning oqibatida metotreksatning gematologik toksikligi oshadi.</p>
                <p>Ehtiyotkorlik bilan ishlatiladigan preparatlarning majmuasi:
            
                    Haftada 15 mg dan pastroq dozada metotreksat qabul qilinganda: umuman nosteroid yallig‘lanishga qarshi preparatlar metotreksatning buyrak klirensini pasaytiradilar, xususan salisilatlar esa, uni plazma oqsillari bilan bog‘idan siqib chiqaradilar, buning oqibatida metotreksatning gematologik toksikligi oshadi.
                    
                    Antikoagulyantlar (geparin): trombositlarning funksiyasini bostirishi, me‘da va o‘n ikki barmoq ichak shilliq qavatini shikastlashi va peroral antikoagulyantlarni, ularni plazma oqsillari bilan bog‘idan siqib chiqarishi hisobiga qon ketishi xavfini oshiradi.
                    
                    Boshqa nosteroid yallig‘lanishga qarshi preparatlar yuqori dozadagi (sutkada ≥3 g) salisilatlar bilan: sinergik samarasi hisobiga, me‘da-ichak yo‘llarining shilliq qavatlarida yaralarning paydo bo‘lishi va qon ketishlarining xavfi oshadi.</p>
                <p>Urikozurik preparatlar (benzbromaron, probenesid): siydik kislotasini raqobatli tubulyar chiqarilishi hisobiga urikozurik samarasi pasayadi.
            
                    Digoksin: buyrak orqali chiqarilishini pasayishi oqibatida, digoksinning plazmadagi konsentrasiyasi oshadi.
                    
                    Gipoglikemik preparatlar (insulin, sulfonilmochevina hosilalari): asetilsalisil kislotasi yuqori dozalarda gipoglikemik hususiyatlarga egaligi va sulfonilmochevinani plazma oqsillari bilan bog‘idan siqib chiqarishi hisobiga, gipoglikemik samarasi kuchayadi.
                    
                    Trombolitiklar va antiagregantlar (tiklopidin): qon ketishi xavfini oshiradi.</p>
                <p>Diuretiklar sutkada 3 g va ko‘proq dozadagi asetilsalisil kislotasi bilan birga: buyrakda prostaglandinlarning sintezini pasayishi oqibatida, glomerulyar filtrasiya pasayadi.
            
                    Tizimli glyukokortikosteroidlar, gidrokortizondan tashqari, glyukokortikosteroidlar salisilatlarning eliminasiyasini kamaytirishi tufayli, qondagi salisilatlarning konsentrasiyasi ularni qo‘llash davrida pasayadi, bekor qilinganidan keyin esa, salisilatlarning dozasini oshirib yuborilishining xavfi oshadi.
                    
                    Angiotenzin-aylantiruvchi ferment ingibitorlari: asetilsalisil kislotasi sutkada 3 g va ko‘proq dozada prostagalandinlarning sintezini ingibisiya qilinishi oqibatida, glomerulyar filtrasiyaning pasayishini chaqiradi. Keyinchalik angiotenzin-aylantiruvchi ferment ingibitorlarini gipotenziv samarasini pasayishi kuzatiladi.
                    
                    Valproat kislotasi: valproat kislotasini oqsillar bilan bog‘idan siqib chiqarishi hisobiga uning toksikligini oshiradi.
                    
                    Alkogol: asetilsalisil kislotasi bilan qo‘shilganida me‘da-ichak yo‘llarining shilliq qavatiga shikastlovchi ta‘siri kuchayadi va qon ketishining vaqti uzayadi.
                    
                    Narkotik analgetiklar, trombolitiklar va trombositlar agregasiyasini ingibitorlari, sulfanilamidlarning (shu jumladan ko-trimoksazol) samarasini kuchaytiradi.
                    
                    Barbituratlar, litiy tuzlarining plazmadagi konsentrasiyasini oshiradi.
                    
                    Magniy va/yoki alyuminiy saqlovchi antasidlar, asetilsalisil kislotasining so‘rilishini sekinlashtiradilar.
                    
                    Mielotoksik dori vositalari preparatning gematotoksik ko‘rinishlarini kuchaytiradilar.</p>
                <b>Maxsus ko‘rsatmalar</b>
                <p>Bolalarga asetilsalisil kislotasini saqlovchi preparatlarni, virusli infeksiyalar chaqirgan o‘tkir respirator kasalliklar bo‘lmagan hollarda buyurish mumkin, chunki virusli infeksiya holida Rey sindromining paydo bo‘lishini xavfi oshadi. Rey sindromining simptomlari quyidagilar: davomli qusish, o‘tkir ensefalopatiya, jigarni kattalashishi.</p>
                <p>Asetilsalisil kislotasi bronxospazmning rivojlanishini qo‘zg‘atishi va bronxial astma xurujini yoki boshqa allergik reaksiyalarni chaqirishi mumkin.</p>
                <p>Pasientni anamnezida bronxial astma, pichan isitmasi, burun polipozi, nafas a‘zolarining surunkali kasalliklari, shuningdek boshqa preparatlarga allergik reaksiyalar (masalan, qichishish, eshakemi, boshqa teri reaksiyalari) xavf omillari hisoblanadi.</p>
                <p>Asetilsalisil kislotasining trombositlar agregasiyasini bostirish qobiliyati jarrohlik aralashuvlar (kichik jarrohlik aralashuvlarni ham qo‘shib, masalan, tishlarni olib tashlash) vaqtida va keyin yuqori qonovchanlikka olib kelishi mumkin. Asetilsalisil kislotasi yuqori dozalarda qo‘llanganida, qon ketishlarining xavfi oshadi.
            
                    Asetilsalisil kislotasi past dozalarda siydik kislotasining chiqarilishini pasaytiradi, bu uning chiqarilishini dastlabki past darajasi bo‘lgan pasientilarda podagrani rivojlanishiga olib kelishi mumkin.
                    
                    Preparat bolalar ololmaydigan joyda saqlansin va yaroqlilik muddati o‘tgach qo‘llanilmasin.</p>
                <b>Dozani oshirib yuborilishi</b>  
                <p>Simptomlari: engil (150 mg/kg dan kamroq bir martalik doza) va og‘irligi o‘rtacha darajali (150-300 mg/kg) dozani oshirib yuborilishi: ko‘ngil aynishi, qusish, quloqlarda shovqin, eshitishni pasayishini his qilish, ko‘rishni buzilishi, bosh og‘rig‘i, bosh aylanishi, tormozlanish, umumiy holsizlik, isitma. Bu simptomlar doza pasaytirilganida yoki preparat bekor qilinganida o‘tib ketadi.</p>
                <p>Og‘ir darajali dozani oshirib yuborilishi: markaziy genezli o‘pkalarning giperventilyasiyasi, respirator alkoloz, metabolik asidoz, ongni chalkashishi, uyquchanlik, kollaps, tirishishlar, anuriya, qon ketishi. Dastlab o‘pkalarning markaziy giperventilyasiyasi nafas alkoloziga olib keladi – hansirash, bo‘g‘ilish, sianoz, sovuq yopishqoq ter; intoksikasiya kuchayishi bilan, respirator asidozni chaqiruvchi nafasni falaji va oksidlanishli fosforlanishni ajralishi oshib boradi.</p>
                <p>Dozani surunkali oshirib yuborilishida plazmada aniqlanadigan konsentrasiya, intoksikasiyaning og‘irlik darajasi bilan korrelyasiya qilmaydi. Surunkali intoksikasiyaning rivojlanishini eng katta xavfi keksa yoshli shaxslarda bir necha sutka davomida sutkada 100 mg/kg dan ko‘proq qabul qilinganida aniqlanadi. Bolalar va keksa yoshli pasientlarda salisilizmning boshlang‘ich belgilari har doim ham sezilarli bo‘lmaydi, shuning uchun vaqti-vaqti bilan qonda salisilatlarning miqdorini aniqlash maqsadga muvofiqdir: 70 mg% dan yuqori konsentrasiya o‘rtacha yoki og‘ir; 100 mg% dan yuqori – o‘ta og‘ir prognoztik noxush zaharlanishdan dalolat beradi. O‘rtacha va og‘ir zaharlanishda gospitalizasiya kerak.</p>
                <p>Davolash: qusishni qo‘zg‘atish, faollantirilgan ko‘mir va surgi vositalarini buyurish, kislota-ishqor holati va elektrolit muvozanatini doimiy nazorat qilish; moddalar almashinuvining holatiga qarab – natriy gidrokarbonati, natriy sitrati yoki natriy laktati eritmasini yuborish. Zahira ishqoriylikni oshirish siydikning ishqoriylashi xisobiga asetilsalisil kislotasining chiqarilishini kuchaytiradi. Salisilatlarning konsentrasiyasi 40 mg% dan yuqori bo‘lganida siydikni ishqoriylashtirish ko‘rsatilgan va natriy gidrokarbonatini vena ichiga infuziyasi ta‘minlanadi (88 mEkv 1 l 5% li dekstroza eritmasida, 10-15 ml/s/kg tezlikda), ishqoriy diurez siydikning 7,5-8 orasidagi rN olingunicha, agarda kattalarda qon plazmasida salisilatlarning konsentrasiyasi 500 mg/l (3,6 mmol/l) dan ko‘proqni yoki bolalarda 300 mg/l (2,2 mmol/l) ni tashkil qilsa, jadallangan ishqoriy diurezga erishilgan deb xisoblanadi); aylanayotgan qon hajmini tiklanishiga va diurezni induksiyasiga natriy gidrokarbonatini o‘sha dozalarda va suyultirib yuborish bilan erishiladi, u 2-3 marta takrorlanadi. Keksa bemorlarda ehtiyotkorlikka rioya qilish kerak, ularda suyuqlikni jadal infuziyasi o‘pkalarning shishiga olib kelishi mumkin. Siydikni ishqoriylashtirish uchun asetazolamidni qo‘llash tavsiya qilinmaydi (asidoz chaqirishi va salisilatlarning toksik ta‘sirini kuchaytirishi mumkin). Salisilatlarning konsentrasiyasi 100-300 mg% dan ko‘proq, surunkali zaharlanishi bo‘lgan bemorlarda – 40 mg% va pastligida ko‘rsatmalar mavjudligida (refrakter asidoz, holatni yomonlashib borishi, markaziy nerv tizimini og‘ir shikastlanishi, o‘pkalarning shishi va buyrak yetishmovchiligi) gemodializ ko‘rsatilgan. O‘pkalarning shishida – kislorod bilan boyitilgan aralashma bilan o‘pkaning sun‘iy ventilyasiyasi o‘tkaziladi.</p>
                <b>Chiqarilish shakli</b>
                <p>Tabletkalar 0,25 g; 0,5 g № 6; № 10 (kontur uyasiz o‘ramlar); №10; №20 (kontur uyali o‘ramlar), №10 (flakonlar).</p>
                <b>Saqlash sharoiti</b>
                <p>Quruq, yorug‘likdan himoyalangan joyda, 250S dan yuqori bo‘lmagan haroratda saqlansin.</p>
                <b>Yaroqlilik muddati</b>
                <p>4 yil.</p>
                <b>Dorixnalardan olish tartibi</b>
                <p>Reseptsiz.</p>  ',
                'category_id'=>2,
                'created_at' => now(), 
                'updated_at' => now(),
            ]
        ]);
    }
}
