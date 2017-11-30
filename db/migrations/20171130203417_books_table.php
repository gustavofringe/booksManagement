<?php


use Phinx\Migration\AbstractMigration;

class BooksTable extends AbstractMigration
{
    /**
     * Change Method.
     *
     * Write your reversible migrations using this method.
     *
     * More information on writing migrations is available here:
     * http://docs.phinx.org/en/latest/migrations.html#the-abstractmigration-class
     *
     * The following commands can be used in this method and Phinx will
     * automatically reverse them when rolling back:
     *
     *    createTable
     *    renameTable
     *    addColumn
     *    renameColumn
     *    addIndex
     *    addForeignKey
     *
     * Remember to call "create()" or "update()" and NOT "save()" when working
     * with the Table class.
     */
    public function change()
    {
        $this->table('books',['id'=>'bookID'])
            ->addColumn('title','string')
            ->addColumn('author','string')
            ->addColumn('resume','text')
            ->addColumn('releaseDate','date')
            ->addColumn('available','boolean')
            ->addColumn('categoryID','integer')
            ->addForeignKey('categoryID','categories','categoryID',[
                'delete'=>'NO_ACTION',
                'update'=>'NO_ACTION'
            ])
            ->addColumn('borrowerID','integer')
            ->addForeignKey('borrowerID','borrowers','borrowerID',[
                'delete'=>'NO_ACTION',
                'update'=>'NO_ACTION'
            ])
            ->create();

    }
}
