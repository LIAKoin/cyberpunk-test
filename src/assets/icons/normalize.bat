@echo off
chcp 65001 > nul
setlocal enabledelayedexpansion

REM Проверяем, переданы ли файлы
if "%~1"=="" (
    echo Перетащи файлы на этот батник.
    pause
    exit /b
)

REM Счетчики
set count=0
set renamed=0
set skipped=0

echo Начинаю обработку...
echo.

REM Перебираем все переданные файлы
set args=%*
set "args=%args:"=%"

for %%f in (%*) do (
    set /a count+=1
    
    set "fullpath=%%~f"
    set "filename=%%~nf"
    set "fileext=%%~xf"
    set "filepath=%%~dpf"
    
    REM Пропускаем батники
    if /i "%%~xf"==".bat" (
        echo [ПРОПУЩЕН] Батник: "%%~nxf"
        set /a skipped+=1
    ) else (
        REM Создаем временные переменные с кавычками для безопасности
        set "oldname=!fullpath!"
        set "oldfilename=!filename!"
        
        REM Проверяем окончание
        if "!oldfilename:~-4!"==" (1)" (
            set "newname=!oldfilename:~0,-4!"
            set "newpath=!filepath!!newname!!fileext!"
            
            REM Переименовываем используя кавычки
            ren "!oldname!" "!newname!!fileext!" 2>nul
            
            if !errorlevel! == 0 (
                echo [ГОТОВО] "!filename!!fileext!" -^> "!newname!!fileext!"
                set /a renamed+=1
            ) else (
                REM Проверяем, может файл уже существует
                if exist "!newpath!" (
                    echo [ПРОПУЩЕН] "!filename!!fileext!" - файл "!newname!!fileext!" уже существует
                ) else (
                    echo [ОШИБКА] Не удалось переименовать "!filename!!fileext!"
                )
                set /a skipped+=1
            )
        ) else (
            echo [ПРОПУЩЕН] "!filename!!fileext!" - нет окончания " (1)"
            set /a skipped+=1
        )
    )
)

echo.
echo ========== ИТОГО ==========
echo Всего файлов: %count%
echo Переименовано: %renamed%
echo Пропущено: %skipped%
echo ============================
echo.
pause