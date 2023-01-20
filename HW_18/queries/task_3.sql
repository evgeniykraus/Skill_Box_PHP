# ЗАДАНИЕ 3. ОБЪЕДИНЕНИЕ ДАННЫХ


# ЧТО НУЖНО СДЕЛАТЬ

# НАПИШИТЕ СЛЕДУЮЩИЕ SQL-ЗАПРОСЫ, ВЫБИРАЮЩИЕ ДАННЫЕ:


# 1. ЗАПРОС, КОТОРЫЙ ВЫБЕРЕТ НАЗВАНИЯ ВСЕХ ЖИВОТНЫХ И НАЗВАНИЯ ИХ КЛАССОВ.
SELECT
    ANIMALS.NAME,
    AC.NAME AS CLASS_NAME
FROM
    ANIMALS
    LEFT JOIN ANIMAL_CLASSES AC
    ON AC.ID = ANIMALS.CLASS_ID;


# 2. ЗАПРОС, КОТОРЫЙ ВЫБЕРЕТ НАЗВАНИЯ ВСЕХ ГОРОДОВ, А ТАКЖЕ НАЗВАНИЯ И КОДЫ ИХ СТРАН.
SELECT CITIES.NAME,
       C.NAME,
       C.CODE
FROM CITIES
         LEFT JOIN COUNTRIES C
                   ON C.ID = CITIES.COUNTRY_ID;


# 3. ЗАПРОС, КОТОРЫЙ ВЫБЕРЕТ КЛАССЫ ЖИВОТНЫХ, В КОТОРЫХ ЕСТЬ И ЛЕТАЮЩИЕ, И НЕЛЕТАЮЩИЕ ЖИВОТНЫЕ,
# И СРЕДИ ЖИВОТНЫХ ЭТИХ КЛАССОВ ВЫБЕРЕТ ТОЛЬКО ТЕХ, КОТОРЫЕ НЕ ЛЕТАЮТ.
# НА ВЫХОДЕ В РЕЗУЛЬТАТЕ ОДНОГО ОБЩЕГО ЗАПРОСА ДОЛЖНЫ БЫТЬ НАЗВАНИЯ ОДНОВРЕМЕННО И ЖИВОТНОГО, И ЕГО КЛАССА.
SELECT CLASS_NAME,
       GROUP_CONCAT(ANIMAL_NAME SEPARATOR ', ') AS ANIMALS
FROM (SELECT ANIMAL_CLASSES.NAME AS CLASS_NAME,
             ANIMALS.NAME        AS ANIMAL_NAME
      FROM ANIMAL_CLASSES
               JOIN ANIMALS
                    ON ANIMALS.CLASS_ID = ANIMAL_CLASSES.ID
      WHERE ANIMAL_CLASSES.CAN_FLYING = 1
        AND ANIMALS.CAN_FLYING = 0) TBL
GROUP BY CLASS_NAME;