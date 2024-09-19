<?php 

namespace sistema\Suporte;

use PHPMailer\PHPMailer\PHPMailer;

/**
 * Classe Email
 * 
 * @author Ricardo Soares <ricardojso72@hotmail.com>
 */

 final class Email
 {
    /**
     * PHPMailer
     * @var PHPMailer
     */

     private PHPMailer $mail;
     /**
      * Armazena anexos
      *@var array
      */
private array $anexos;
/**
 * Construtor
 */
public function __construct(){
    $this->mail = new PHPMailer(true);

    $this->mail->isSMTP();
    $this->mail->Host = 'smtp.hostinger.com';
    $this->mail->SMTPAuth = true;
    $this->mail->Username='ceo@unset.com.br';
    $this->mail->Password ='UPHLg4uG6Jnb*Du';
    $this->mail->SMTPSecure= PHPMailer::ENCRYPTION_SMTPS;
    $this->mail->Port = 465;

    $this->mail->setLanguage('pt_br');
    $this->mail->CharSet = 'utf-8';
    $this->mail->isHTML(true);

    $this->anexos = [];
}
/**
 * @param string $assunto
 * @param string $conteudo
 * @param string $destinatarioEmail
 * @param string $destinatarioNome
 * @param string|null $responderEmail
 * @param string|null $responderNome
 * @return static
 */

 public function criar(

        string $assunto,
        string $conteudo,
        string $destinatrioEmail,
        string $destinarioNome,
        string $responderEmail = null,
        string $responderNome = null): static
 {
    $conteudo .=$this->rodape();

    $this->mail->Subject = $assunto;
    $this->mail->Body->$conteudo;
    $this->mail->isHTML($conteudo);

    $this->mail->addAddress($destinatrioEmail, $destinarioNome);

    if($responderEmail !== null&& $responderNome !== null){
        $this->mail->addReplyTo($responderEmail, $responderNome);
    }
    return $this;
 }
/**
 * Enviar e-mail
 * @param string $remetenteEmail
 * @param string $remetente
 * @return bool
 */

 public function enviar(string $remetenteEmail, string $remetenteNome): bool{
    try{
        $this->mail->setFrom($remetenteEmail, $remetenteNome);
        foreach ($this->anexos as $anexo){
            $this->mail->addStringAttachment($anexo['caminho'], $anexo['nome']);
        }
        $this->mail->send();
        return true;
    }catch(Exception $ex){
        $ex = $this->mail->ErrorInfo;
        return false;
    }
 }

/**
 * Armazena Aquivos para serem anexados
 * @param string $caminho
 * @param string|null $nome
 * @return static
 */
public function anexar(string $caminho, ?string $nome = null): static
{
    $nome = $nome ?? basename($caminho);

    $this->anexos[] = [
        'caminho'=>$caminho,
        'nome'=> $nome
    ];
    return $this;
}
/**
 * Rodapé
 * @return string
 */
private function rodape(): string{
    return "<hr><small>Enviado por " . SITE_NOME . " em: " . date('d/m/y') . " às ". date('H:i') . "</small>";
}

}
