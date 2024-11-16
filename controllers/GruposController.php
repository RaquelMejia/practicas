<?php

require_once 'BaseController.php';

class GruposController extends BaseController
{
    public function index(Request $request)
    {
        $page = $request->get('page') ?? 1;
        $search = $request->get('search') ?? '';
        $params = $search ? ['search' => $search] : [];

        $data = DB::table('users_groups')->where('nombre', 'LIKE', '%' . $search . '%')->paginate(15, $page);
        $grupos = $data->getItems();
        $paginador = $data->renderPagination('/grupos', $params);

        return $this->view('/grupos/index', [
            'grupos' => $grupos,
            'paginador' => $paginador,
            'search' => $search
        ]);
    }

    public function create()
    {
        return $this->view('/grupos/create');
    }

    public function insert(Request $request)
    {
        $nombre = $request->post('nombre');

        if (!$nombre) {
            return $this->view('grupos/create', [
                'validator' => [
                    "El nombre del grupo es requerido"
                ]
            ]);
        }

        $result = DB::table('users_groups')->insert([
            'name' => trim($name)
        ]);

        if ($result > 0) {
            $this->setFlash("El grupo fue creada correctamente", "success");
            return $this->redirect('grupos');
        }

        return $this->view('grupos/create', [
            'validator' => [
                "No se pudo guardar el registro"
            ]
        ]);
    }

    public function edit($id)
    {
        $grupos = DB::table('users_groups')->where('id', '=', $id)->first();

        if ($grupos) {
            return $this->view('grupos/edit', ['grupos' => $grupos]);
        } else {
            $this->setFlash("El grupo no fue encontrada", "danger");
            return $this->redirect('grupos');
        }
    }

    public function update(Request $request, $id)
    {
        $name = $request->post('nombre');

        if (!$nombre) {
            return $this->view('grupos/edit', [
                'validator' => [
                    "El nombre del grupo es requerido"
                ]
            ]);
        }

        $grupos = DB::table('users_groups')->where('id', '=', $id)->first();

        if ($grupos) {
            $result = DB::table('users_groups')->where('id', '=', $id)->update([
                'name' => trim($name),
                'updated_at' => date('Y-m-d H:i:s')
            ]);

            if ($result > 0) {
                $this->setFlash("El grupo fue actualizada correctamente", "success");
                return $this->redirect('grupos');
            }

            return $this->view('grupos/edit', [
                'validator' => [
                    "No se pudo actualizar el registro"
                ]
            ]);
        }

        $this->setFlash("El grupo no fue encontrada", "danger");
        return $this->redirect('grupos');
    }

    public function delete($id)
    {
        $materia = DB::table('users_groups')->where('id', '=', $id)->first();

        if ($materia) {
            $result = DB::table('users_groups')->where('id', '=', $id)->delete();

            if ($result > 0) {
                $this->setFlash("El grupo fue eliminada correctamente", "success");
                return $this->redirect('grupos');
            }

            $this->setFlash("Error al eliminar un grupo", "danger");
            return $this->redirect('grupos');
        }

        $this->setFlash("El grupo no fue encontrada", "danger");
        return $this->redirect('grupos');
    }
}
