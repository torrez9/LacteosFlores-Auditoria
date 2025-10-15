<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DatabaseRestoreController extends Controller
{
    public function restore(Request $request)
    {
        // Verifica si se ha enviado un archivo de copia de seguridad
        if ($request->hasFile('archivo_copia')) {
            $archivoCopia = $request->file('archivo_copia');

            // Guarda el archivo de copia de seguridad en una ubicación temporal
            $rutaTemporal = $archivoCopia->storeAs('temp', $archivoCopia->getClientOriginalName());

            // Ejecuta el comando de restauración
            $command = sprintf(
                'mysql --user=%s --password=%s --host=%s %s < %s',
                config('database.connections.mysql.username'),
                config('database.connections.mysql.password'),
                config('database.connections.mysql.host'),
                config('database.connections.mysql.database'),
                storage_path('app/' . $rutaTemporal)
                
            );

            exec($command);

            // Elimina el archivo de copia de seguridad temporal
            unlink(storage_path('app/' . $rutaTemporal));

            return redirect()->back()->with('success', 'La base de datos ha sido restaurada correctamente.');
        }

        return redirect()->back()->with('error', 'No se ha seleccionado ningún archivo de copia de seguridad.');
  }


}
