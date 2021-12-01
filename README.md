# aoc21.adamkiss.com

> Advent of Code 2021 - my solutions as a [Kirby](https://getkirby.com) site

---

## Installation - Inputs

Since the Advent of Code authors asked the participants to not share their inputs, the inputs in this site are added as a submodule from private repo (which is _a pain in the ass_). Anyway, if you want to try the code, you'll need to provide your own inputs.

They are located in the `/site/inputs` directory, and are PHP files that return your specific input in the same shape as is the demo input for the relevant day, e.g. `array` of `integers` for the day 01.

## Developing with this project

After cloning and fixing the inputs:

``` bash
# Install dependencies
composer install -no
npm run ci

# Develop front-end
npm run start
# Bundle assets for production
npm run prod
```

## Unstable (-alpha/-rc) dependencies

- TailwindCSS is installed as 3.0.0-alpha2

Based on the [AdamKiss/Kirby-AdamKitt](https://github.com/adamkiss/kirby-adamkitt).

(c) 2021 Adam Kiss, unless stated otherwise.
