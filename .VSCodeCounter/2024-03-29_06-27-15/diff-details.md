# Diff Details

Date : 2024-03-29 06:27:15

Directory c:\\xampp\\htdocs\\kiki\\velo-expresso-back

Total : 51 files,  23909 codes, 90 comments, 2145 blanks, all 26144 lines

[Summary](results.md) / [Details](details.md) / [Diff Summary](diff.md) / Diff Details

## Files
| filename | language | code | comment | blank | total |
| :--- | :--- | ---: | ---: | ---: | ---: |
| [README.md](/README.md) | Markdown | 8 | 0 | 9 | 17 |
| [controllers/Bikes.controller.php](/controllers/Bikes.controller.php) | PHP | 120 | 0 | 28 | 148 |
| [controllers/FeaturesBikes.controller.php](/controllers/FeaturesBikes.controller.php) | PHP | 46 | 0 | 8 | 54 |
| [controllers/Home.controller.php](/controllers/Home.controller.php) | PHP | -10 | 0 | 1 | -9 |
| [controllers/Main.controller.php](/controllers/Main.controller.php) | PHP | 0 | 0 | 3 | 3 |
| [controllers/Opinions.controller.php](/controllers/Opinions.controller.php) | PHP | 73 | 0 | 19 | 92 |
| [controllers/Partners.controller.php](/controllers/Partners.controller.php) | PHP | 58 | 2 | 11 | 71 |
| [controllers/Rental.controller.php](/controllers/Rental.controller.php) | PHP | 108 | 1 | 24 | 133 |
| [controllers/Slider.controller.php](/controllers/Slider.controller.php) | PHP | 27 | 0 | 7 | 34 |
| [controllers/Tools.controller.php](/controllers/Tools.controller.php) | PHP | 31 | 6 | 5 | 42 |
| [controllers/Workshop.controller.php](/controllers/Workshop.controller.php) | PHP | 11 | 1 | 1 | 13 |
| [index.php](/index.php) | PHP | 32 | 1 | 5 | 38 |
| [indexComponents/bikes.index.php](/indexComponents/bikes.index.php) | PHP | 90 | 5 | 14 | 109 |
| [indexComponents/featuresBikes.index.php](/indexComponents/featuresBikes.index.php) | PHP | 20 | 4 | 6 | 30 |
| [indexComponents/opinions.index.php](/indexComponents/opinions.index.php) | PHP | 22 | 4 | 8 | 34 |
| [indexComponents/partners.index.php](/indexComponents/partners.index.php) | PHP | 23 | 3 | 7 | 33 |
| [indexComponents/rental.index.php](/indexComponents/rental.index.php) | PHP | 57 | 5 | 13 | 75 |
| [indexComponents/slider.index.php](/indexComponents/slider.index.php) | PHP | 6 | 3 | 7 | 16 |
| [models/Bikes.model.php](/models/Bikes.model.php) | PHP | 98 | 0 | 11 | 109 |
| [models/FeaturesBikes.model.php](/models/FeaturesBikes.model.php) | PHP | 41 | 0 | 13 | 54 |
| [models/Opinions.model.php](/models/Opinions.model.php) | PHP | 56 | 0 | 17 | 73 |
| [models/Partners.model.php](/models/Partners.model.php) | PHP | 46 | 0 | 9 | 55 |
| [models/Rental.model.php](/models/Rental.model.php) | PHP | 103 | 0 | 17 | 120 |
| [models/Slider.model.php](/models/Slider.model.php) | PHP | 7 | 0 | 4 | 11 |
| [models/Workshop.model.php](/models/Workshop.model.php) | PHP | 0 | 1 | 3 | 4 |
| [models/pdo.model.php](/models/pdo.model.php) | PHP | 20 | 1 | 0 | 21 |
| [package-lock.json](/package-lock.json) | JSON | 44 | 0 | 1 | 45 |
| [package.json](/package.json) | JSON | 15 | 0 | 1 | 16 |
| [public/style/custom/_custom.scss](/public/style/custom/_custom.scss) | SCSS | 21 | 0 | 2 | 23 |
| [public/style/style.css](/public/style/style.css) | CSS | 21,876 | 46 | 1,792 | 23,714 |
| [public/style/style.scss](/public/style/style.scss) | SCSS | 4 | 7 | 4 | 15 |
| [views/common/template.php](/views/common/template.php) | PHP | 8 | 0 | 2 | 10 |
| [views/components/header.php](/views/components/header.php) | PHP | 6 | 0 | -1 | 5 |
| [views/components/notices/general_notice.php](/views/components/notices/general_notice.php) | PHP | 8 | 0 | 0 | 8 |
| [views/components/notices/notices.php](/views/components/notices/notices.php) | PHP | 2 | 0 | 0 | 2 |
| [views/pages/bikes/bikes.view.php](/views/pages/bikes/bikes.view.php) | PHP | 36 | 0 | 8 | 44 |
| [views/pages/bikes/createBike.view.php](/views/pages/bikes/createBike.view.php) | PHP | 160 | 0 | 5 | 165 |
| [views/pages/bikes/features.view.php](/views/pages/bikes/features.view.php) | PHP | 51 | 0 | 2 | 53 |
| [views/pages/bikes/new_bikes.view.php](/views/pages/bikes/new_bikes.view.php) | PHP | 39 | 0 | 8 | 47 |
| [views/pages/bikes/oneBikePage.view.php](/views/pages/bikes/oneBikePage.view.php) | PHP | 318 | 0 | 4 | 322 |
| [views/pages/bikes/used_bikes.view.php](/views/pages/bikes/used_bikes.view.php) | PHP | 40 | 0 | 8 | 48 |
| [views/pages/home/partners.view.php](/views/pages/home/partners.view.php) | PHP | 30 | 0 | 10 | 40 |
| [views/pages/home/sliders.view.php](/views/pages/home/sliders.view.php) | PHP | 3 | 0 | 6 | 9 |
| [views/pages/opinions/opinionsPage.view.php](/views/pages/opinions/opinionsPage.view.php) | PHP | 31 | 0 | 8 | 39 |
| [views/pages/opinions/validatedOpinionsPage.view.php](/views/pages/opinions/validatedOpinionsPage.view.php) | PHP | 30 | 0 | 7 | 37 |
| [views/pages/rental.view.php](/views/pages/rental.view.php) | PHP | -1 | 0 | 0 | -1 |
| [views/pages/rental/addRental.view.php](/views/pages/rental/addRental.view.php) | PHP | 21 | 0 | 12 | 33 |
| [views/pages/rental/allRentals.view.php](/views/pages/rental/allRentals.view.php) | PHP | 32 | 0 | 7 | 39 |
| [views/pages/rental/modifyRental.view.php](/views/pages/rental/modifyRental.view.php) | PHP | 29 | 0 | 9 | 38 |
| [views/pages/rental/textUnderArray.view.php](/views/pages/rental/textUnderArray.view.php) | PHP | 13 | 0 | 1 | 14 |
| [views/pages/workshop/categories.view.php](/views/pages/workshop/categories.view.php) | PHP | 0 | 0 | -1 | -1 |

[Summary](results.md) / [Details](details.md) / [Diff Summary](diff.md) / Diff Details