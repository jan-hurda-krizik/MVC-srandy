# MVC-srandy
MVC Srandy


Princip je vždy stejný: aplikace je postavená na jednoduchém MVC. Stačí tedy nahradit (1) názvy a (2) obsah modelů, kontrolerů a views podle nové domény (např. telefonní seznam, e-shop, atd.). Postup:

1) Připravit novou databázi a tabulky
Místo tabulky posts si vytvořte třeba tabulku contacts (pokud děláte telefonní seznam).
Sloupce uzpůsobte požadovaným datům (např. id, name, phone_number, email…).

2) Upravit Model
Ve složce models/ můžete přejmenovat soubor Post.php na Contact.php.
V kódu uvnitř změňte třídu Post na Contact.
Metody (např. getAllPosts(), createPost()) přejmenujte na getAllContacts(), createContact(), atd.
V SQL dotazech nahraďte posts za contacts, title za name, content za phone_number apod.


3) Upravit Controller
Ve složce controllers/ přejmenujte PostController.php na ContactController.php.
Třídu PostController změňte na ContactController.
Místo $this->postModel = new Post(); dejte $this->contactModel = new Contact();.
Metody (index, create, edit, delete, view) můžete zachovat, jen v nich zaměňte volání metod modelu.
V parametrech formulářů teď zpracováváte jiná pole (name, phone, email), nikoliv title a content.


4) Upravit Views
Místo views/posts/ vytvořte views/contacts/.
Změňte názvy i obsah formulářů, tabulek a výpisů.
Místo title a content dejte name, phone, email, atd.


5) Upravit routy
Místo PostController v index.php dejte ContactController.
Definujte stejné cesty (/, /create, /edit, /delete, /view) nebo jiné, podle potřeby.


Shrnutí
Model
Přizpůsobte tabulku a sloupce v SQL dotazech (contacts, name, phone_number, …).
Controller
Přejmenujte třídu i metody (ContactController, getAllContacts()), přizpůsobte logiku.
View
Nové formuláře a výpisy pro telefonní seznam (místo title, content budou name, phone, email).
Router a cesty
Upravte index.php, aby volal ContactController místo PostController.
Definujte směrování na /create, /edit, atd. dle potřebné funkce.
Otestujte
V prohlížeči http://localhost/blog/ (index), http://localhost/blog/create (přidání kontaktu)...
To je celý proces. Logika i kód zůstávají velmi podobné, jen se mění názvy. Takhle se MVC řešení přizpůsobuje každé doméně (blog, telefonní seznam, cokoliv jiného).
