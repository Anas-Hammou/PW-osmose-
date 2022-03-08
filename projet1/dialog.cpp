#include "dialog.h"
#include "ui_dialog.h"

Dialog::Dialog(QWidget *parent) :
    QDialog(parent),
    ui(new Ui::Dialog)
{
    ui->setupUi(this);
}

Dialog::~Dialog()
{
    delete ui;
}
void Dialog::setclient(client C){
    ui->lineEdit_CIN2->setText(C.get_cin());
      ui->lineEdit_nom2->setText(C.get_nom());
         ui->lineEdit_prenom3->setText(C.get_prenom());
}


