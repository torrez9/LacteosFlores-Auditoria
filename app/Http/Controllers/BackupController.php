<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\File;
use Spatie\Backup\Tasks\Backup\BackupJob;


class BackupController extends Controller
{
    public function index(){
        return view('mantenimiento.create');
    }
    public function realizarBackup()
    {
        $nombreUsuario = 'root'; // Nombre de usuario de la base de datos
        $nombreBaseDatos = 'lacteosflores1'; // Nombre de la base de datos
    
        $nombreArchivo = 'backup_' . date('Y-m-d_H-i-s') . '.sql';
    
        // Ruta completa del archivo de respaldo
        $rutaArchivo = 'C:\Users\MSI\Downloads' . $nombreArchivo;
        
        // Comando para realizar el respaldo de la base de datos (MySQL)
        $command = sprintf(
            'mysqldump -u%s %s > %s',
            $nombreUsuario,
            $nombreBaseDatos,
            $rutaArchivo
        );
        
        // Ejecutar el comando
        exec($command);
        
        // Verificar si el archivo de respaldo existe
        if (file_exists($rutaArchivo)) {
            // Devuelve el archivo de respaldo como una descarga
            return response()->download($rutaArchivo, $nombreArchivo)->deleteFileAfterSend();
        } else {
            // Si el archivo de respaldo no existe, redirige con un mensaje de error
         return redirect()->back()->with('error', 'No se pudo crear el archivo de respaldo.');
    }
}
}