<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SubjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('subjects')->insert([
            'name' => 'Analízis II. Gyakorlat',
            'description' => "Speciális elemi függvények (exponenciális-, logaritmus-, hatványfüggvény).
            Egyváltozós valós függvények differenciálhatósága. Műveletek differenciálható függvényekkel.
            Az összetetett, ill. az inverz függvény deriváltja. Középérték tételek. Differenciálható
            függvények vizsgálata: monotonitás, szélsőérték. L'Hospital-tétel. Többször differenciálható
            függvények. Hatványsor öszegfüggvényének a deriváltjai. Taylor-sor, Taylor-polinom. Konvex,
            konkáv függvények, kapcsolat a deriválttal. Inflexió.
            A Riemann-integrál definíciója. Műveletek integrálható függvényekkel. Az integrál intervallum
            szerinti additivitása. Folytonos, ill. monoton függvény integrálható. Newton-Leibniz-tétel.
            Primitív függvény, határozatlan integrál. Integrálási szabályok, a parciális és a helyettesítéses
            integrálás szabálya. A határozott integrál alkalmazásai.",
            'code' => 'IK-ANG001',
            'credit' => 5,
            'public' => true,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Numerikus Módszerek Gyakorlat',
            'description' => "A lebegőpontos számábrázolás egy modellje. A hibaszámítás elemei.
            Lineáris egyenletrendszerek (LER) megoldása: direkt módszerek (Gauss-elimináció, LU felbontás)
            Mátrixnormák. Lineáris egyenletrendszerek kondícionáltsága.
            Nemlineáris egyenletek megoldása. Intervallum-felezés algoritmusa, fixpont tétel [a;b] intervalumra.
            Newton-módszer. A Horner algoritmus polinom helyettesítési értékeinek gyors számolására. Becslés a
            polinom gyökeinek elhelyezkedésére.
            A polinom interpoláció. Lagrange és Newton alak. A Csebisev polinomok szerepe az interpolációban.
            Legkisebb négyzetek módszere. A négyzetesen legjobban közelítő polinom előállítása.
            Numerikus integrálás. Newton-Cotes formulák (érintő-, trapéz- és Simpson formula, összetett formulák).",
            'code' => 'IK-NMG001',
            'credit' => 5,
            'public' => true,
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Osztott rendszerek specifikációja és implementációja',
            'description' => "A tárgy célja, hogy bemutassa párhuzamos és osztott rendszerek programozásának és
            felépítésének alapvető fogalmait és a hallgatók gyakorlatot szerezzenek elosztott programok
            tervezésében és implementálásában.
            A tárgy tartalma:
            - Osztott programok specifikációja.
            - Folyamat, absztrakt program, pártatlan ütemezés, összefésüléses szemantika.
            - Invariáns, biztonságossági és haladási tulajdonságok. Elérhető állapotok.
            - Levezetési szabályok: biztonságossági és haladási tulajdonságokra vonatkozó tételek,
            variánsfüggvény alkalmazása.
            - Asszociatív művelet eredményének kiszámítása, maximumkeresés.
            - Programkonstrukciók, lokalitás tétel, interferencia.
            - Aszinkron és szinkron kommunikáció, üzenettovábbítás, csatornaváltozók, adatcsatorna tétele,
            elágazás és multiplexer.
            Tanult ismeretek alkalmazása: elosztott programok készítése egy előre megadott környezetben
            (pl. C++ és PVM).",
            'code' => 'IK-ORS100',
            'credit' => 5,
            'public' => true,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Diszkrét matematika modellek és alkalmazásaik',
            'description' => "A tantárgy keretében elméleti oldaról az alapvető diszkrét matematikai és gráfelméleti fogalmakat,
            valamint bizonyítási technikákat sajátíthatják el az érdeklődők. Gyakorlati oldalról gráfalgoritmusokat,
            valamint kapcsolódó alkalmazási területeket mutatunk be.
            Tematika: gráfok ábrázolásai; párosítások keresése páros és átlalános gráfokban, egzisztencia és
            algoritmikus megoldás, magyar módszer; folyamok, maximális folyam, minimális vágás, általánosítások;
            gráfszínezések, perfekt gráfok; részgráfokkal kapcsolatos problémák; síkgráfok, gráfok ábrázolásai; nagy
            gráfok alapjai, centralitások, gráfparaméterek.",
            'code' => 'IK-DIM999',
            'credit' => 3,
            'public' => true,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Formális nyelvek és a fordítóprogramok alapjai',
            'description' => "A formális nyelvek elméletének alapfogalmai (ábécé, szó, nyelv, nyelvcsalád, műveletek
            szavakon és nyelveken). A generatív grammatika fogalma. Chomsky-féle nyelvosztályok,
            Chomsky-féle hierarchia.
            Reguláris kifejezések és kapcsolatuk a 3-as típusú nyelvosztállyal, 3-as normál forma.
            Véges automata modellek (determinisztikus, nemdeterminisztikus) és kapcsolatuk a reguláris
            nyelvekkel. Determinisztikus véges automata minimalizálása, Myhill-Nerode tétel.
            Környezetfüggetlen grammatikák, BNF, levezetési (szintaxis) fa, LL(k), LR(k) nyelvtanok.
            Veremautomata modellek és kapcsolatuk a környezetfüggetlen nyelvekkel.
            Fordítóprogramok feladata és felépítése.
            Lexikális elemzés.
            Szintaktikus elemzés módszerei (LL, LR). Szimbólumtábla kezelés.
            Szemantikus elemzés, típusellenőrzés, attribútum grammatikák. Elemző generátor programok.
            Assembly alapok, egyszerű assembly programok írása. Kódgenerálási sémák, magas szintű
            nyelvi elemek assembly nyelvre fordítása",
            'code' => 'IK-FNA201',
            'credit' => 5,
            'public' => true,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Analízis 9 & 3/4',
            'description' => "Majd a hallgatók kitalálják.",
            'code' => 'IK-ANG501',
            'credit' => 99,
            'public' => true,
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Funkcionális programozás',
            'description' => "A tárgy célja a programozás iránt érdeklődő hallgatók részére betekintési lehetőséget nyújtani a
            napjainkban egyre nagyobb népszerűségnek örvendő funkcionális programozási módszer elveibe,
            matematikai alapjaiba és eszközeibe.
            A nyelvi eszközök használata gyakorlatias módon, de az elméleti alapokat sem mellőzve, Haskell
            és/vagy Clean programozási nyelven keresztül kerül bemutatásra.
            A kurzusra jelentkező diákok az alábbi fogalmakkal ismerkednek meg a félév során: hivatkozási
            helyfüggetlenség, kiértékelés, lusta és mohó kiértékelési stratégia, normál forma, rekurzió,
            magasabbrendű függvények, típusrendszer, függvénydefiníciók, mellékhatásmentes függvények,
            mintaillesztés, őrfeltételek, adatszerkezetek, lokális definíciók, ZF-kifejezések, polimorfizmus,
            típusszinonímák, algebrai adattípus, absztrakt adattípus, modulok, típusosztályok, példányosítás",
            'code' => 'IK-FPR000',
            'credit' => 5,
            'public' => true,
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Logika',
            'description' => "A logika szemantikus tárgyalása, következményfogalom, szemantikus és szintaktikus.
            Eldöntésprobléma mint a logikai programozás háttere.
            Deduktív módszerek. A rezolúciós elv tárgyalása, Herbrand tételek, legáltalánosabb illesztő
            helyettesítés. Klózhalmaz kielégíthetetlenségét vizsgáló nevezetes módszerek. Fontosabb
            rezolúciós stratégiák. A logikai programozás alapelve. A logika és a logikai programozás
            viszonya. A PROLOG jellegű logikai program és a lineáris input rezolúció viszonya.",
            'code' => 'IK-LGA548',
            'credit' => 5,
            'public' => true,
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        DB::table('subjects')->insert([
            'name' => 'Mély neuronhálók state-of-the-art alkalmazásai',
            'description' => "A feltételként szabott szoftveres kurzusok lehetővé teszik, hogy a hallgatók a legújabb state-ofthe-art mély hálók teljesítményével, hierarchikus struktúrájával és minőségi betanítási
            módszerekkel, valamint a szükséges adatbázisok tipikus méreteivel is megismerkedjenek. Kép-,
            videó-, szöveg- és hangfeldolgozási eljárok lesznek választhatóak a kurzuson néhány előzetes
            benchmark feladat sikeres betanítása után.",
            'code' => 'IK-TST002',
            'credit' => 2,
            'public' => true,
            'user_id' => 3,
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
