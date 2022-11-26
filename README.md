# API to retrieve information about belgian companies

API of belgian companies based on public OpenData from the [Banque Carrefour of Belgian government](https://kbopub.economie.fgov.be/kbo-open-data/login).

# Data manual

<https://economie.fgov.be/sites/default/files/Files/Entreprises/BCE/Cookbook-BCE-Open-Data.pdf>

# Why this API?

This API is a simple way to get data from the [Banque Carrefour of Belgian government](https://kbopub.economie.fgov.be/kbo-open-data/login).

# How to use it?

1. Clone this repository ;
2. Get the date from the [Banque Carrefour of Belgian government](https://kbopub.economie.fgov.be/kbo-open-data/login) and put it in the `csv` folder ;
3. Run the notebook `./prepare-data.ipynb` to prepare the data ;
4. Run `php artisan serve` to start the API on port `8000` ;
