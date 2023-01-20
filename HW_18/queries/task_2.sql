# ЗАДАНИЕ 2. СОРТИРОВКА И ОГРАНИЧЕНИЕ ВЫБОРКИ

# ЧТО НУЖНО СДЕЛАТЬ

# НАПИШИТЕ СЛЕДУЮЩИЕ SQL-ЗАПРОСЫ, ВЫБИРАЮЩИЕ ДАННЫЕ:

# 1. ВЫБРАТЬ ВСЕХ ЖИВОТНЫХ ПО АЛФАВИТУ.

SELECT *
FROM ANIMALS
ORDER BY NAME;

# 2. ВЫБРАТЬ ТОЛЬКО ПОСЛЕДНИЙ ГОРОД ПО АЛФАВИТУ.
SELECT *
FROM CITIES
ORDER BY NAME DESC
LIMIT 1;


# 3. ВЫБРАТЬ ПОСЛЕДНИЙ ДОБАВЛЕННЫЙ КЛАСС ЖИВОТНОГО (С НАИБОЛЬШИМ ID).
SELECT *
FROM ANIMAL_CLASSES
ORDER BY ID DESC
LIMIT 1;


# 4. ВЫБРАТЬ ПЕРВУЮ ПАРУ (ПЕРВОЕ И ВТОРОЕ ЖИВОТНОЕ) ЛЕТАЮЩИХ ЖИВОТНЫХ, ОТСОРТИРОВАННЫХ ПО ВОЗРАСТАНИЮ ID.
SELECT *
FROM ANIMALS
WHERE CAN_FLYING = 1
ORDER BY ID
LIMIT 2;


# 5. ВЫБРАТЬ ВТОРУЮ ПАРУ (ТРЕТЬЕ И ЧЕТВЁРТОЕ ЖИВОТНОЕ) ЛЕТАЮЩИХ ЖИВОТНЫХ, ОТСОРТИРОВАННЫХ ПО ВОЗРАСТАНИЮ ID.
SELECT *
FROM ANIMALS
WHERE CAN_FLYING = 1
ORDER BY ID
LIMIT 2 OFFSET 2;